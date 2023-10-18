<?php
session_start();
require('db.php');
if (!$_SESSION['user'])
    header("Location:login.php");
$user = $_SESSION['user'];
?>



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
                                <img src="<?php echo $user['profile']; ?>" alt="image">
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?php echo $user['name'] ?></p>
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
                                <img src="<?php echo $user['profile']; ?>" alt="image">
                                <span class="login-status online"></span>
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2"><?php echo $user['name'] ?></span>
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
                                <li class="breadcrumb-item"><a href="#">Charts</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chart-js</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Bar chart</h4>
                                    <canvas id="barChart" style="height:230px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pie chart</h4>
                                    <canvas id="pieChart" style="height:230px"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Doughnut chart</h4>
                                    <canvas id="doughnutChart" style="height:230px"></canvas>
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
    <!-- <script src="assets/js/chart.js"></script> -->
    <script>
        $(function() {
            let barChartCanvas = $("#barChart").get(0).getContext("2d"),
                pieChartCanvas = $("#pieChart").get(0).getContext("2d"),
                doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d"),
                dataForBar, dataForPie, datum, labels, backgroundColors, borderColors;

            $.getJSON('data.php?charts', function(items) {
                labels = [];
                datum = [];
                backgroundColors = [];
                borderColors = [];
                items.forEach(item => {
                    labels.push(item.titre);
                    datum.push(item.nombre_commentaires);
                    for (let i = 0; i < items.length; i++) {
                        backgroundColor = getColors()[0];
                        borderColor = getColors()[1];
                        backgroundColors.push(backgroundColor);
                        borderColors.push(borderColor);
                    }
                });
                dataForBar = {
                    labels: labels,
                    datasets: [{
                        data: datum,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1,
                        fill: false
                    }],
                };

                dataForPie = {
                    datasets: [{
                        data: datum,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                    }],
                    labels: labels,
                };

                makeBarChart('bar', dataForBar, barChartCanvas);
                makePieChart('pie', dataForPie, pieChartCanvas);
                makePieChart('doughnut', dataForPie, doughnutChartCanvas);
            });

            function makeBarChart(type, data, ctx) {
                return new Chart(ctx, {
                    type: type,
                    data: data,
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        elements: {
                            point: {
                                radius: 0
                            }
                        },
                    },
                });
            }

            function makePieChart(type, data, ctx) {
                return new Chart(ctx, {
                    type: type,
                    data: data,
                    options: {
                        responsive: true,
                        animation: {
                            animateScale: true,
                            animateRotate: true
                        },
                    }
                });
            }

            // if ($("#pieChart").length) {
            //     var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
            //     var pieChart = new Chart(pieChartCanvas, {
            //         type: 'pie',
            //         data: doughnutPieData,
            //         options: doughnutPieOptions
            //     });
            // }

            function getColors() {
                let chartColors = [],
                    borderColors = [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    backgroundColors = [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    index = Math.floor(7 * Math.random());
                backgroundColor = backgroundColors[index];
                borderColor = borderColors[index];
                chartColors.push(backgroundColor, borderColor);
                return chartColors;
            }
        });
    </script>
</body>

</html>