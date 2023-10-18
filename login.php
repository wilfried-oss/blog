<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <img src="assets/images/logo.svg" alt="Logo">
                            </div>
                            <h4>Bonjour ! commençons</h4>
                            <h6 class="font-weight-light">Connectez-vous pour continuer</h6>
                            <div id="message"></div>
                            <form id="form" class="pt-3" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="auto@gmail.com" required>
                                </div>
                                <div class="form-group" id="form1">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">Se connecter</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                            Rester connecté </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Mot de passe oublié?</a>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Vous n'avez pas de compte?
                                    <a href="register.php" class="text-primary">Créer</a>
                                </div>
                            </form>
                            <!-- Ajout d'un élément pour afficher les messages -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Ajout de jQuery (si ce n'est pas déjà inclus dans votre projet) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $('#form1').on('click', function() {
                var passwordInput = $('#password');
                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });

            $('#form').on('submit', function(e) {
                e.preventDefault(); // Empêche le rechargement de la page après soumission

                var email = $('#email').val();
                var password = $('#password').val();

                var userData = {
                    email: email,
                    password: password
                };

                $.ajax({
                    type: 'POST',
                    url: 'data.php', // Assurez-vous que l'URL est correcte pour le traitement côté serveur
                    data: userData,
                    dataType: 'json',
                    success: function(response) {
                        // La requête AJAX a été réussie, et vous pouvez traiter la réponse ici
                        // Par exemple, si votre script de traitement renvoie une réponse JSON avec un message de succès
                        if (response.success == true) {
                            window.location.href = 'index.php'; // Redirigez l'utilisateur vers la page de destination après la connexion réussie
                        } else {
                            $('#message').html('<div class="alert alert-danger text-center">Identifiants invalides ! </div>');
                        }
                    },
                });
            });

            $('input').on('keyup', function() {
                $('#message').empty();
            });
        });
    </script>
</body>

</html>