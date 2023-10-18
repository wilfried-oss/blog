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
                            <h4>Nouveau ici?</h4>
                            <h6 class="font-weight-light">Inscription est facile. Cela ne prend que quelques étapes</h6>
                            <div id="message"></div>

                            <form class="pt-3" id="form" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="profile" class="file-upload-default" required>
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Chargé Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Image</button>
                                        </span>
                                    </div>
                                </div>


                                <div class="form-group" id="form1">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group" id="form2">
                                    <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                                </div>

                                <div class="mb-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" required>
                                            Je suis d'accord avec toutes les conditions générales </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Vous avez déjà un compte ? <a href="login.php" class="text-primary">Se connecter</a>
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
        // ... Votre code JavaScript existant ...



        $(function() {
            $('#form1').on('click', function() {
                var passwordInput = $('#password');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });

            $('#form2').on('click', function() {
                var passwordInput = $('#confirm_password');

                if (passwordInput.attr('type') === 'password') {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });

            $('#form').submit(function(event) {
                event.preventDefault(); // Empêche le rechargement de la page

                // Récupérer les valeurs des champs de formulaire
                var email = $('#email').val();
                var name = $('#name').val();
                var password = $('#password').val();
                var confirm_password = $('#confirm_password').val();

                // Vérifier si les mots de passe correspondent
                if (password !== confirm_password) {
                    $('#message').html('<div class="alert alert-danger text-center">Les mots de passe ne correspondent pas.</div>');
                    return; // Arrêter l'exécution de la fonction
                }
                var userData = new FormData($('#form')[0]);

                // Créer un objet contenant les données de l'utilisateur

                /*
                var userData = {
                    email: email,
                    name: name,
                    password: password,
                    profile: profile
                };*/

                // Effectuer la requête Ajax pour inscrire l'utilisateur
                $.ajax({
                    url: 'data.php', // Remplacez par votre URL de traitement du formulaire d'inscription
                    type: 'POST',
                    data: userData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#form')[0].reset();


                        if (response == 1) {
                            $('#message').html('<div class="alert alert-success text-center">Inscription réussie !</div>');
                        } else {
                            $('#message').html('<div class="alert alert-danger text-center"> Erreur lors de l\'inscription</div>');
                        }

                    },
                });
            });
            $('input').on('keyup', function() {
                $('#message').empty();
            });

        });

        (function($) {
            'use strict';
            $(function() {
                $('.file-upload-browse').on('click', function() {
                    var file = $(this).parent().parent().parent().find('.file-upload-default');
                    file.trigger('click');
                });
                $('.file-upload-default').on('change', function() {
                    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
                });
            });
        })(jQuery);
    </script>
</body>

</html>