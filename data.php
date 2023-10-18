<?php
session_start();
require('db.php');

if (isset($_POST['email'], $_POST['name'], $_POST['password'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password = hash('sha256', $password);

    // Traitement de l'image
    $targetDir = "upload/";  // Dossier de destination des images
    $imageName = $_FILES["profile"]["name"]; // Nom de l'image
    $imagePath = $targetDir . $imageName;  // Chemin de l'image

    // Vérifier si l'email existe déjà
    $checkSql = "SELECT COUNT(*) FROM user WHERE email = :email";
    $checkStmt = $db->prepare($checkSql);
    $checkStmt->execute([':email' => $email]);

    $emailExists = $checkStmt->fetchColumn();

    if ($emailExists) {
        echo json_encode(['error' => 'Cette adresse e-mail est déjà utilisée. Veuillez en choisir une autre.']);
    } else {
        // Insérer l'utilisateur dans la base de données
        $insertSql = "INSERT INTO user (email, name, password, profile) VALUES (:email, :name, :password, :profile)";
        $insertStmt = $db->prepare($insertSql);

        // Remplacez :profile par la valeur appropriée pour le champ de profil

        $feedback = $insertStmt->execute([
            ':email' => $email,
            ':name' => $name,
            ':password' => $password,
            ':profile' => $imagePath
        ]);


        if ($feedback) {
            move_uploaded_file($_FILES["profile"]["tmp_name"], $imagePath);
        }
        echo $feedback;
    }
} elseif (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password = hash('sha256', $password);


    // Vérifier les informations de connexion dans la base de données
    $stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && ($password == $user["password"])) {

        // Les informations de connexion sont valides
        $_SESSION['user'] = $user;
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        // Les informations de connexion sont invalides
        $response = array("error" => false);
        echo json_encode($response);
    }
} elseif (isset($_GET['acceuil'])) {
    $query1 = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 4;');
    $query2 = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE billet_id=? ORDER BY date_commentaire_fr DESC LIMIT 4;');
    while ($data = $query1->fetch()) {
        $billet = [];
        $billet['id'] = $data['id'];
        $billet['titre'] = $data['titre'];
        $billet['contenu'] = $data['contenu'];
        $billet['date_creation_fr'] = $data['date_creation_fr'];
        $query2->execute([$data['id']]);
        $commetaires = [];
        while ($data = $query2->fetch()) {
            $commetaire = $data['auteur'] . " : " . $data['commentaire'];
            $commetaires[] = $commetaire;
        }
        $billet['commentaires'] = $commetaires;
        $billets[] = $billet;
    }
    echo json_encode($billets);
} elseif (isset($_POST['ajout_commentaire'])) {
    $billet_id = $_POST['ajout_commentaire'][0];
    $auteur = htmlspecialchars($_POST['ajout_commentaire'][1]);
    $commetaire = htmlspecialchars($_POST['ajout_commentaire'][2]);
    $query = $db->prepare('INSERT IGNORE INTO commentaires(billet_id, auteur, commentaire) VALUES(?, ?, ?);');
    $feedback = $query->execute([$billet_id, $auteur, $commetaire]);
    echo $feedback;
} elseif (isset($_POST['titre'], $_POST['contenu'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $query = $db->prepare('insert into billets (titre, contenu) values (?, ?)');
    $feedback = $query->execute([$titre, $contenu]);
    echo $feedback;
} elseif (isset($_GET['tous_les_billets'])) {
    $query1 = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC;');
    $query2 = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE billet_id=? ORDER BY date_commentaire_fr DESC LIMIT 6;');
    while ($data = $query1->fetch()) {
        $billet = [];
        $billet['id'] = $data['id'];
        $billet['titre'] = $data['titre'];
        $billet['contenu'] = $data['contenu'];
        $billet['date_creation_fr'] = $data['date_creation_fr'];
        $query2->execute([$data['id']]);
        $commetaires = [];
        while ($data = $query2->fetch()) {
            $commetaire = $data['auteur'] . " : " . $data['commentaire'] . " [ " . $data['date_commentaire_fr'] . " ]";
            $commetaires[] = $commetaire;
        }
        $billet['commentaires'] = $commetaires;
        $billets[] = $billet;
    }
    echo json_encode($billets);
} elseif (isset($_GET['charts'])) {
    $query1 = $db->query('SELECT id, titre FROM billets;');
    $query2 = $db->prepare('SELECT count(*) as nombre_commentaires FROM commentaires WHERE billet_id=?;');
    while ($data = $query1->fetch()) {
        $billet = [];
        $billet['titre'] = $data['titre'];
        $query2->execute([$data['id']]);
        while ($data = $query2->fetch()) {
            $nombre_commentaires = $data['nombre_commentaires'];
        }
        $billet['nombre_commentaires'] = $nombre_commentaires;
        $billets[] = $billet;
    }
    // print_r($billets);
    echo json_encode($billets);
}
