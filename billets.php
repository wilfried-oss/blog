<!DOCTYPE html>
<html lang="en">

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
                                <li class="breadcrumb-item"><a href="#">Rendu</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tous les billets</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tous les billets</h4>
                                    <p class="card-description">
                                        Avec <code>leurs commentaires</code>
                                    </p>
                                    <hr>
                                    <div id="billets"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="grid-margin stretch-card">
                                        <div class="card mt-2">
                                            <div id="modal-infos" class="card-body"></div>
                                        </div>
                                    </div>
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
        $.getJSON("data.php?tous_les_billets", function(billets) {
            $("#billets").empty();
            billets.forEach((billet) => {
                const card = $(`
            <div>
                <div>
                  <div>
                    <h4 class="text-primary ml-2">
                      ${billet.titre}
                      <small class="text-muted">
                        (${billet.date_creation_fr})
                      </small>
                    </h4>
                    <br>
                    <h5 class="text-dark ml-2"> 
                      Contenu : ${billet.contenu}
                    </h5>
                    <h4 class="text-danger mt-4 ml-2">
                      Derniers commentaires
                    </h4>
                  </div>
                </div>
            </div>
        `);
                let ul = $(`<ul class="list-star card"></ul>`);
                for (let i = 0; i < billet.commentaires.length; i++) {
                    ul.append(
                        $(`<li class="ml-2 text-muted">${billet.commentaires[i]}</li>`)
                    );
                }
                let btn_class = "mt-3 offset-10 col-2" + " " + "btn" + " " + getColor();

                ul.append(
                    $(
                        `<button id="${billet.id}" name="${billet.titre}" class="${btn_class}"><i class="mdi mdi-plus"></i></button><hr/>`
                    )
                );
                card.append(ul);
                $("#billets").append(card);
            });

            $("#billets").on("click", "button", function() {
                let id = $(this).attr("id");
                let name = $(this).attr("name");
                $("#modal-infos").empty();
                $("#modal-infos").append(
                    $(`
                <h4 class="card-title">${name}</h4>
                <p class="card-description">Ajouter un commentaire</p>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="auteur">Auteur</label>
                    <input class="form-control" id="auteur" placeholder="Auteur" />
                  </div>
                  <div class="form-group">
                    <label for="commentaire">Commentaire</label>
                    <textarea class="form-control" id="commentaire" placeholder="Commentaire"></textarea>
                  </div>
                </form>
                <button id="close" class="btn btn-gradient-danger">Close</button>
                <button id=${id} class="offset-3 btn btn-gradient-primary">Save changes</button>
            `)
                );
                $(".modal").show();
            });

            $("#modal-infos").on("click", "#close", function() {
                $(".modal").hide();
            });

            $("#modal-infos").on("click", ".btn-gradient-primary", function() {
                let billet_id = $(this).attr("id");
                let auteur = $("#auteur").val();
                let commentaire = $("#commentaire").val();
                if (billet_id && auteur && commentaire) {
                    let ajout_commentaire = [];
                    ajout_commentaire = [billet_id, auteur, commentaire];
                    $.post(
                        "data.php", {
                            ajout_commentaire,
                        },
                        function(response) {
                            location.reload();
                        }
                    );
                }
            });

            function getColor() {
                let index = "";
                let colors = [
                    "btn-gradient-primary",
                    "btn-gradient-secondary",
                    "btn-gradient-success",
                    "btn-gradient-danger",
                    "btn-gradient-warning",
                    "btn-gradient-info",
                    "btn-gradient-dark",
                ];
                index = Math.floor(Math.random() * colors.length);
                return colors[index];
            }
        });
    </script>
</body>

</html>