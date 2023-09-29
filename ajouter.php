<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Mon blog</title>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="#"><img src="assets/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="#"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" disabled class="form-control bg-transparent border-0" placeholder="Chercher billets" />
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile">
                        <a class="nav-link" id="profileDropdown" href="#" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/face1.jpg" alt="image" />
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">David Greymaax</p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-settings d-none d-lg-block">
                        <a class="nav-link" href="#">
                            <i class="mdi mdi-format-line-spacing"></i>
                        </a>
                    </li>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>

            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="assets/images/faces/face1.jpg" alt="profile" />
                                <span class="login-status online"></span>
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2">David Grey. H</span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <span class="menu-title">Acceuil</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">Autres Eléments</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="ajouter.php">Ajouter un billet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="billets.php">Tous les billets</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="charts.php">
                            <span class="menu-title">Charts</span>
                            <i class="mdi mdi-chart-bar menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span>
                            Mon Blog
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Formulaire</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ajouter un billet</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-3 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Default form</h4>
                                    <p class="card-description">Basic form layout</p>
                                    <form class="forms-sample">
                                        <div class="form-group">
                                            <label for="titre">Titre</label>
                                            <input type="text" autofocus class="form-control" id="titre" placeholder="Titre" />
                                        </div>
                                        <div class="form-group">
                                            <label for="contenu">Contenu </label>
                                            <input type="text" class="form-control" id="contenu" placeholder="Contenu" />
                                        </div>
                                    </form>
                                    <button type="button" id="cancel" class="btn btn-gradient-danger">Reset</button>
                                    <button type="button" id="submit" class="offset-3 btn btn-gradient-primary">Save change</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap Dash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script>
        $(function() {
            $("#cancel").on("click", function() {
                $("#titre").val(" ");
                $("#contenu").val(" ");
            });
            $("#submit").on("click", function() {
                let titre = $("#titre").val().trim();
                let contenu = $("#contenu").val().trim();
                if (titre && contenu) {
                    $.post(
                        "data.php", {
                            titre,
                            contenu,
                        },
                        function(response) {}
                    );
                    $("#titre").val(" ");
                    $("#contenu").val(" ");
                }
            });
        });
    </script>
</body>

</html>