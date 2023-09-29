<?php
require('db.php');
if (isset($_GET['acceuil'])) {
    $query1 = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT 4;');
    $query2 = $db->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_ajout, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE billet_id=? ORDER BY date_commentaire_fr DESC LIMIT 3;');
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
