<?php
ini_set('display_errors', 'On');
session_start();
include('connect.php');
?>
<?php
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}

$login_session = $_SESSION['login_user'];
$user_name = $_SESSION['login_name'];
$hris_no = $_SESSION['hris_no'];
?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>FSF Ticketing Admin Dashboard</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../assets/js/config.js"></script>
    <script src="../../vendors/simplebar/simplebar.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <style>
        .badge-subtle-danger {
            color: #dc3545;
            background-color: #f8d7da;
        }

        .badge-subtle-primary {
            color: #007bff;
            background-color: #cce5ff;
        }

        .badge-subtle-success {
            color: #28a745;
            background-color: #d4edda;
        }
    </style>

    <link href="../../vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="../../vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="../../assets/css/theme-rtl.css" rel="stylesheet" id="style-rtl">
    <link href="../../assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="../../assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl">
    <link href="../../assets/css/user.css" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>

            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false"
                        aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="../../index.html">
                        <div class="d-flex align-items-center"><img class="me-2"
                                src="../../assets/img/icons/spot-illustrations/gifanime.gif" alt="" width="60" />
                            <span class="font-sans-serif text-primary">FSF Ticketing Admin</span>
                        </div>
                    </a>
                    <ul class="navbar-nav align-items-center d-none d-lg-block">
                        <li class="nav-item">

                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                        <li class="nav-item ps-2 pe-0">
                            <div class="dropdown theme-control-dropdown"><a
                                    class="nav-link d-flex align-items-center dropdown-toggle fa-icon-wait fs-9 pe-1 py-0"
                                    href="#" role="button" id="themeSwitchDropdown" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"><span class="fas fa-sun fs-7"
                                        data-fa-transform="shrink-2"
                                        data-theme-dropdown-toggle-icon="light"></span><span class="fas fa-moon fs-7"
                                        data-fa-transform="shrink-3" data-theme-dropdown-toggle-icon="dark"></span><span
                                        class="fas fa-adjust fs-7" data-fa-transform="shrink-2"
                                        data-theme-dropdown-toggle-icon="auto"></span></a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-caret border py-0 mt-3"
                                    aria-labelledby="themeSwitchDropdown">
                                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="button"
                                            value="light" data-theme-control="theme"><span
                                                class="fas fa-sun"></span>Light<span
                                                class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button>
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="button"
                                            value="dark" data-theme-control="theme"><span class="fas fa-moon"
                                                data-fa-transform=""></span>Dark<span
                                                class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button>
                                        <button class="dropdown-item d-flex align-items-center gap-2" type="button"
                                            value="auto" data-theme-control="theme"><span class="fas fa-adjust"
                                                data-fa-transform=""></span>Auto<span
                                                class="fas fa-check dropdown-check-icon ms-auto text-600"></span></button>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="nav-item dropdown px-1">
                            <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button"
                                data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16"
                                    fill="none">
                                    <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                                    <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                                    <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                                    <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                                    <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                                    <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                                    <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                                    <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                                    <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                                </svg></a>
                            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg"
                                aria-labelledby="navbarDropdownMenu">
                                <div class="card shadow-none">
                                    <div class="scrollbar-overlay nine-dots-dropdown">
                                        <div class="card-body px-3">
                                            <div class="row text-center gx-0 gy-0">
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="../../pages/user/profile.html" target="_blank">
                                                        <div class="avatar avatar-2xl"> <img class="rounded-circle"
                                                                src="../../assets/img/team/3.jpg" alt="" /></div>
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11">Account
                                                        </p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="https://themewagon.com/" target="_blank"><img
                                                            class="rounded"
                                                            src="../../assets/img/nav-icons/themewagon.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Themewagon</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="https://mailbluster.com/" target="_blank"><img
                                                            class="rounded"
                                                            src="../../assets/img/nav-icons/mailbluster.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Mailbluster</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/google.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Google</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/spotify.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Spotify</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/steam.png" alt="" width="40"
                                                            height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Steam</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/github-light.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Github</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/discord.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Discord</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/xbox.png" alt="" width="40"
                                                            height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">xbox
                                                        </p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/trello.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Kanban</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/hp.png" alt="" width="40"
                                                            height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Hp
                                                        </p>
                                                    </a></div>
                                                <div class="col-12">
                                                    <hr class="my-3 mx-n3 bg-200" />
                                                </div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/linkedin.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Linkedin</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/twitter.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Twitter</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/facebook.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Facebook</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/instagram.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Instagram</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/pinterest.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Pinterest</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/slack.png" alt="" width="40"
                                                            height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Slack</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="#!" target="_blank"><img class="rounded"
                                                            src="../../assets/img/nav-icons/deviantart.png" alt=""
                                                            width="40" height="40" />
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">
                                                            Deviantart</p>
                                                    </a></div>
                                                <div class="col-4"><a
                                                        class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none"
                                                        href="../../app/events/event-detail.html" target="_blank">
                                                        <div class="avatar avatar-2xl">
                                                            <div
                                                                class="avatar-name rounded-circle bg-primary-subtle text-primary">
                                                                <span class="fs-7">E</span>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11">Events
                                                        </p>
                                                    </a></div>
                                                <div class="col-12"><a class="btn btn-outline-primary btn-sm mt-4"
                                                        href="#!">Show more</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-xl">
                                    <img class="rounded-circle" src="../../assets/img/team/3-thumb.png" alt="" />

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0"
                                aria-labelledby="navbarDropdownUser">
                                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                    <a class="dropdown-item fw-bold text-warning" href="#!"><span
                                            class="fas fa-user me-1"></span><span><?php echo $user_name; ?></span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="login.php">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="card shadow-none border">
                    <div class="bg-holder bg-card d-none d-md-block"
                        style="background-image:url(../../assets/img/illustrations/reports-bg.png);">
                    </div>
                    <!--/.bg-holder-->
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Welcome <?php echo $user_name; ?> 🎉</h5>
                                    <p class="mb-4">
                                        You can see <span class="fw-medium">what happens</span> to your tickets and
                                        manage them effortlessly
                                        with our intuitive system.
                                    </p>



                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="../../assets/img/illustrations/admin2.png" height="150"
                                        alt="View Badge User">
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php


                    $sql = "SELECT COUNT(*) as created_ticket_count FROM FSF_TICKETING_USER WHERE TICKET_CREATED = 'YES'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $createdticketCount = $row['created_ticket_count'];
                    } else {
                        $createdticketCount = 0;
                    }

                    ?>

                </div>
                <div class="card overflow-hidden mt-3">
                    <div class="card-header p-0 bg-body-tertiary scrollbar-overlay">
                        <ul class="nav nav-tabs border-0 tab-tickets-status flex-nowrap" id="in-depth-chart-tab"
                            role="tablist">
                            <li class="nav-item text-nowrap" role="presentation"><a
                                    class="nav-link mb-0 d-flex align-items-center gap-2 py-3 px-x1 active"
                                    id="tickets-created-tab" data-bs-toggle="tab" href="#tickets-created" role="tab"
                                    aria-controls="tickets-created" aria-selected="true"><span
                                        class="fas fa-ticket-alt icon text-600"></span>
                                    <h6 class="mb-0 text-600">Tickets Created<span>
                                            (<?php echo $createdticketCount; ?>)</span></h6>
                                </a></li>

                            <?php
                            $sql = "SELECT COUNT(*) as resolved_ticket_count FROM FSF_TICKETING_USER WHERE TICKET_RESOLVED = 'YES'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $resolvedticketCount = $row['resolved_ticket_count'];
                            } else {
                                $resolvedticketCount = 0;
                            }

                            ?>

                            <li class="nav-item text-nowrap" role="presentation"><a
                                    class="nav-link mb-0 d-flex align-items-center gap-2 py-3 px-x1"
                                    id="tickets-resolved-tab" data-bs-toggle="tab" href="#tickets-resolved" role="tab"
                                    aria-controls="tickets-resolved" aria-selected="false"><span
                                        class="fas fa-check icon text-600"></span>
                                    <h6 class="mb-0 text-600">Tickets Resolved<span>
                                            (<?php echo $resolvedticketCount; ?>)
                                        </span></h6>
                                </a></li>
                            <?php
                            $sql = "SELECT COUNT(*) as reopened_ticket_count FROM FSF_TICKETING_USER WHERE TICKET_RESOLVED = 'YES'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $reopenedticketCount = $row['reopened_ticket_count'];
                            } else {
                                $reopenedticketCount = 0;
                            }

                            ?>

                            <li class="nav-item text-nowrap" role="presentation"><a
                                    class="nav-link mb-0 d-flex align-items-center gap-2 py-3 px-x1"
                                    id="tickets-reopened-tab" data-bs-toggle="tab" href="#tickets-reopened" role="tab"
                                    aria-controls="tickets-reopened" aria-selected="false"><span
                                        class="fas fa-envelope-open-text icon text-600"></span>
                                    <h6 class="mb-0 text-600">Tickets Reopened<span>
                                            (<?php echo $reopenedticketCount; ?>)
                                        </span></h6>
                                </a></li>

                            <?php
                            $sql = "SELECT COUNT(*) as unsolved_ticket_count FROM FSF_TICKETING_USER WHERE TICKET_UNSOLVED = 'YES'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $unsolvedticketCount = $row['unsolved_ticket_count'];
                            } else {
                                $unsolvedticketCount = 0;
                            }

                            ?>

                            <li class="nav-item text-nowrap" role="presentation"><a
                                    class="nav-link mb-0 d-flex align-items-center gap-2 py-3 px-x1"
                                    id="tickets-unsolved-tab" data-bs-toggle="tab" href="#tickets-unsolved" role="tab"
                                    aria-controls="tickets-unsolved" aria-selected="false"><span
                                        class="fas fa-exclamation-triangle icon text-600"></span>
                                    <h6 class="mb-0 text-600">Tickets Unsolved<span>
                                            (<?php echo $unsolvedticketCount; ?>)
                                        </span></h6>
                                </a></li>
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tickets-created" role="tabpanel"
                                aria-labelledby="tickets-created-tab">
                                <div class="row mx-0 border-bottom border-dashed">
                                    <div
                                        class="col-md-6 p-x1 border-end-md border-bottom border-bottom-md-0 border-dashed">
                                        <h6 class="fs-10 mb-3">Tickets created Split by Source</h6>

                                        <div class="row mt-2">

                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">TV</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_created FROM FSF_TICKETING_USER WHERE CATEGORY='TV' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_created_Count = $row['tickets_created'];
                                            $progress = ($tickets_created_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="33"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_created_Count; ?>
                                                </p>
                                            </div>
                                        </div>


                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Phone</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_created FROM FSF_TICKETING_USER WHERE CATEGORY='Mobile Phones' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_created_Count = $row['tickets_created'];
                                            $progress = ($tickets_created_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="60"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_created_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Tabs</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_created FROM FSF_TICKETING_USER WHERE CATEGORY='Tabs' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_created_Count = $row['tickets_created'];
                                            $progress = ($tickets_created_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_created_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Electronics</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_created FROM FSF_TICKETING_USER WHERE CATEGORY='Electronics' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_created_Count = $row['tickets_created'];
                                            $progress = ($tickets_created_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="87"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_created_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_created FROM FSF_TICKETING_USER WHERE CATEGORY='Computers' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_created_Count = $row['tickets_created'];
                                            $progress = ($tickets_created_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Computers</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px"
                                                    aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_created_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_created FROM FSF_TICKETING_USER WHERE CATEGORY='Other' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_created_Count = $row['tickets_created'];
                                            $progress = ($tickets_created_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Other</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px"
                                                    aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_created_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-x1">
                                        <h6 class="fs-10 mb-3">Tickets created Split by Priority</h6>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Urgent</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Urgent' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="87"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Medium</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Medium' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Low</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Low' AND TICKET_CREATED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="60"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tickets-resolved" role="tabpanel"
                                aria-labelledby="tickets-resolved-tab">
                                <div class="row mx-0 border-bottom border-dashed">
                                    <div
                                        class="col-md-6 p-x1 border-end-md border-bottom border-bottom-md-0 border-dashed">
                                        <h6 class="fs-10 mb-3">Tickets resolved Split by Source</h6>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">TV</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_resolved FROM FSF_TICKETING_USER WHERE CATEGORY='TV' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_resolved_Count = $row['tickets_resolved'];
                                            $progress = ($tickets_resolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_resolved_Count; ?>
                                                </p>

                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Phone</p>
                                            </div>
                                            <?php
                                            $query = "SELECT COUNT(*) as tickets_resolved FROM FSF_TICKETING_USER WHERE CATEGORY='Mobile Phones' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_resolved_Count = $row['tickets_resolved'];
                                            $progress = ($tickets_resolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="50"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_resolved_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Tabs</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_resolved FROM FSF_TICKETING_USER WHERE CATEGORY='Tabs' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_resolved_Count = $row['tickets_resolved'];
                                            $progress = ($tickets_resolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="30"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_resolved_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Electronics</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="95"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_resolved_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_resolved FROM FSF_TICKETING_USER WHERE CATEGORY='Computers' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_resolved_Count = $row['tickets_resolved'];
                                            $progress = ($tickets_resolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Computers</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px"
                                                    aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_resolved_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_resolved FROM FSF_TICKETING_USER WHERE CATEGORY='Other' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_resolved_Count = $row['tickets_resolved'];
                                            $progress = ($tickets_resolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Other</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px"
                                                    aria-valuenow="<?php echo $progress; ?>" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_resolved_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-x1">
                                        <h6 class="fs-10 mb-3">Tickets resolved Split by Priority</h6>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Urgent</p>
                                            </div>

                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Urgent' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Medium</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Medium' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="60"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Low</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Low' AND TICKET_RESOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="70"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mx-0">


                                </div>
                            </div>
                            <div class="tab-pane" id="tickets-reopened" role="tabpanel"
                                aria-labelledby="tickets-reopened-tab">
                                <div class="row mx-0 border-bottom border-dashed">
                                    <div
                                        class="col-md-6 p-x1 border-end-md border-bottom border-bottom-md-0 border-dashed">
                                        <h6 class="fs-10 mb-3">Tickets reopened Split by Source</h6>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">TV</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_rejected FROM FSF_TICKETING_USER WHERE CATEGORY='Mobile Phones' AND TICKET_REJECTED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_rejected_Count = $row['tickets_rejected'];
                                            $progress = ($tickets_rejected_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="40"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_rejected_Count; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Phone</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_rejected FROM FSF_TICKETING_USER WHERE CATEGORY='Mobile Phones' AND TICKET_REJECTED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_rejected_Count = $row['tickets_rejected'];
                                            $progress = ($tickets_rejected_Count / 100) * 100;
                                            ?>

                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="40"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_rejected_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Tabs</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_rejected FROM FSF_TICKETING_USER WHERE CATEGORY='Tabs' AND TICKET_REJECTED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_rejected_Count = $row['tickets_rejected'];
                                            $progress = ($tickets_rejected_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="50"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_rejected_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Electronics</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_rejected FROM FSF_TICKETING_USER WHERE CATEGORY='Electronics' AND TICKET_REJECTED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_rejected_Count = $row['tickets_rejected'];
                                            $progress = ($tickets_rejected_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="20"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_rejected_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Computers</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_rejected FROM FSF_TICKETING_USER WHERE CATEGORY='Computers' AND TICKET_REJECTED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_rejected_Count = $row['tickets_rejected'];
                                            $progress = ($tickets_rejected_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="20"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_rejected_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Other</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_rejected FROM FSF_TICKETING_USER WHERE CATEGORY='Other' AND TICKET_REJECTED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_rejected_Count = $row['tickets_rejected'];
                                            $progress = ($tickets_rejected_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="20"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width: <?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_rejected_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-x1">
                                        <h6 class="fs-10 mb-3">Tickets reopened Split by Priority</h6>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Urgent</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Urgent' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="90"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Medium</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Medium' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="50"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Low</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Low' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="30"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="tickets-unsolved" role="tabpanel"
                                aria-labelledby="tickets-unsolved-tab">
                                <div class="row mx-0 border-bottom border-dashed">
                                    <div
                                        class="col-md-6 p-x1 border-end-md border-bottom border-bottom-md-0 border-dashed">
                                        <h6 class="fs-10 mb-3">Tickets unsolved Split by Source</h6>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Tv</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_unsolved FROM FSF_TICKETING_USER WHERE CATEGORY='TV' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_unsolved_Count = $row['tickets_unsolved'];
                                            $progress = ($tickets_unsolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="50"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $progress; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Phone</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_unsolved FROM FSF_TICKETING_USER WHERE CATEGORY='Mobile Phones' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_unsolved_Count = $row['tickets_unsolved'];
                                            $progress = ($tickets_unsolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="20"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_unsolved_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Tabs</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_unsolved FROM FSF_TICKETING_USER WHERE CATEGORY='Tabs' AND TICKET_UNSOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_unsolved_Count = $row['tickets_unsolved'];
                                            $progress = ($tickets_unsolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="75"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_rejected_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_unsolved FROM FSF_TICKETING_USER WHERE CATEGORY='Electronics' AND TICKET_UNSOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_unsolved_Count = $row['tickets_unsolved'];
                                            $progress = ($tickets_unsolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Electronics</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="30"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_unsolved_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_unsolved FROM FSF_TICKETING_USER WHERE CATEGORY='Electronics' AND TICKET_UNSOLVED='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_unsolved_Count = $row['tickets_unsolved'];
                                            $progress = ($tickets_unsolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Computers</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="30"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_unsolved_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as tickets_unsolved FROM FSF_TICKETING_USER WHERE CATEGORY='Other' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $tickets_unsolved_Count = $row['tickets_unsolved'];
                                            $progress = ($tickets_unsolved_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Other</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="30"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $tickets_unsolved_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-x1">
                                        <h6 class="fs-10 mb-3">Tickets unsolved Split by Priority</h6>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Urgent</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Urgent' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="85"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Medium' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Medium</p>
                                            </div>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="40"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 col-sm-2 col-md-3 col-lg-2">
                                                <p class="mb-0 fs-10 fw-semi-bold text-600 text-nowrap">Low</p>
                                            </div>
                                            <?php

                                            $query = "SELECT COUNT(*) as priority FROM FSF_TICKETING_USER WHERE PRIORITY='Low' AND TICKET_UNSOLVED ='YES'";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $priority_Count = $row['priority'];
                                            $progress = ($priority_Count / 100) * 100;
                                            ?>
                                            <div class="col-9 col-sm-10 col-md-9 col-lg-10 d-flex align-items-center">
                                                <div class="progress bg-200 w-100 rounded-pill" role="progressbar"
                                                    aria-label="Basic example" style="height:6px" aria-valuenow="90"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar rounded-pill animated-progress-bar"
                                                        style="--falcon-progressbar-width:<?php echo $progress; ?>%;">
                                                    </div>
                                                </div>
                                                <p class="mb-0 fs-10 ps-3 fw-semi-bold text-600">
                                                    <?php echo $priority_Count ?>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-body-tertiary py-2">
                        <div class="row flex-between-center">
                            <div class="col-auto">
                                <select class="form-select form-select-sm">
                                    <option>Last 7 days</option>
                                    <option>Last Month</option>
                                    <option>Last Year</option>
                                </select>
                            </div>
                            <div class="col-auto"><a class="btn btn-link btn-sm px-0 fw-medium" href="#!">View all<span
                                        class="fas fa-chevron-right ms-1 fs-11"></span></a></div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center border-bottom py-2">
                        <h6 class="mb-0">Distribution of Performance</h6>
                        <div class="dropdown font-sans-serif btn-reveal-trigger">
                            <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal"
                                type="button" id="dropdown-distribution-of-performance" data-bs-toggle="dropdown"
                                data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span
                                    class="fas fa-ellipsis-h fs-11"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-2"
                                aria-labelledby="dropdown-distribution-of-performance"><a class="dropdown-item"
                                    href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                    href="#!">Remove</a>
                            </div>
                        </div>
                    </div>


                    <?php
                    // Query to fetch data from FSF_TICKETING_USER
                    $query = "SELECT * FROM FSF_TICKETING_USER ";

                    $result = mysqli_query($conn, $query);
                    ?>

                    <div class="card-body">
                        <div id="tableadmin"
                            data-list='{"valueNames":["hris","Employee","Category","Priority","Ticket","Date"],"filter":{"key":"payment"}}'>
                            <div class="row justify-content-end g-0">
                                <div class="col-auto px-3">
                                    <select class="form-select form-select-sm mb-3" aria-label="Bulk actions"
                                        data-list-filter="data-list-filter">
                                        <option selected="" value="">Select Ticket Priority</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive scrollbar">
                                <table class="table table-sm table-striped fs-10 mb-0 overflow-hidden">
                                    <thead class="bg-200">
                                        <tr>
                                            <th class="text-900 sort pe-1 align-middle white-space-nowrap"
                                                data-sort="hris">Hris No</th>
                                            <th class="text-900 sort pe-1 align-middle white-space-nowrap"
                                                data-sort="Employee">Employee Name</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="Category">Category</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="Priority">Priority</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="Ticket">Ticket</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="Date">Date</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="Asign">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="table-purchase-body">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Determine the class based on priority
            $badgeClass = '';
            switch ($row['PRIORITY']) {
                case 'High':
                    $badgeClass = 'badge-subtle-danger';
                    break;
                case 'Medium':
                    $badgeClass = 'badge-subtle-info';
                    break;
                case 'Low':
                    $badgeClass = 'badge-subtle-success';
                    break;
            }
    ?>
            <tr class="btn-reveal-trigger">
                <td class="align-middle white-space-nowrap"><?php echo $row['HRIS_NO']; ?></td>
                <td class="align-middle white-space-nowrap"><?php echo $row['USERNAME']; ?></td>
                <td class="align-middle white-space-nowrap"><?php echo $row['CATEGORY']; ?></td>
                <td class="align-middle white-space-nowrap text-end priority">
                    <span class="badge badge rounded-pill <?php echo $badgeClass; ?>"><?php echo $row['PRIORITY']; ?></span>
                </td>
                <td class="align-middle white-space-nowrap text-end">
                    <a href="#" class="text-decoration-underline" 
                       data-bs-toggle="modal" 
                       data-bs-target="#descriptionModal" 
                       data-ticket-no="<?php echo htmlspecialchars($row['TICKET_NO']); ?>" 
                       data-title="<?php echo htmlspecialchars($row['TITLE']); ?>" 
                       data-description="<?php echo htmlspecialchars($row['DESCRIPTION']); ?>">
                       View
                    </a>
                </td>
                <td class="align-middle white-space-nowrap text-end"><?php echo $row['TICKET_CREATED_DATE']; ?></td>

                <td class="align-middle white-space-nowrap text-end">
                    <button type="button" class="btn btn-success resolve-button" data-ticket-no="<?php echo $row['TICKET_NO']; ?>">RESOLVED</button>
                    <button type="button" class="btn btn-danger reject-button"
                        data-ticket-no="<?php echo $row['TICKET_NO']; ?>">REJECT</button>
                </td>
            </tr>
    <?php
        }
    } else {
    ?>
        <tr><td colspan="7" class="text-center">No tickets found</td></tr>
    <?php
    }
    ?>
                                    </tbody>


                                </table>
                            </div>
                        </div>

                    </div>
<!-- reject modal -->
 
<div class="modal fade" id="rejectRemarkModal" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="rejectRemarkModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg mt-6" role="document">
    <div class="modal-content border-0">
      <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
        <button type="button" class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="rounded-top-3 bg-body-tertiary py-3 ps-4 pe-6">
          <h4 class="mb-1" id="rejectRemarkModalLabel">Reject Remark</h4>
        </div>
        <div class="p-4">
          <div class="row">
            <div class="col-lg-9">
              <div class="d-flex">
                <span class="fa-stack ms-n1 me-3">
                  <i class="fas fa-circle fa-stack-2x text-200"></i>
                  <i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i>
                </span>
                <div class="flex-1">
                  <h5 class="mb-2 fs-9">Description</h5>
                  <textarea class="form-control" id="rejectRemark" rows="3" placeholder="Enter your remarks here..." required></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="ticketNo" name="ticketNo">
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Test -->
<div class="modal fade" id="descriptionModal" data-bs-keyboard="false" data-bs-backdrop="static"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="rounded-top-3 bg-body-tertiary py-3 ps-4 pe-6">
                    <h4 class="mb-1" id="staticBackdropLabel">Ticket Description</h4>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="d-flex">
                                <span class="fa-stack ms-n1 me-3"><i
                                        class="fas fa-circle fa-stack-2x text-200"></i><i
                                        class="fa-inverse fa-stack-1x text-primary fas fa-align-left"
                                        data-fa-transform="shrink-2"></i></span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-9">Ticket No:</h5>
                                    <p class="text-break fs-10"><span id="modalTicketNo"></span></p>
                                </div>
                            </div>
                            <hr class="my-4" />

                            <div class="d-flex">
                                <span class="fa-stack ms-n1 me-3"><i
                                        class="fas fa-circle fa-stack-2x text-200"></i><i
                                        class="fa-inverse fa-stack-1x text-primary fas fa-align-left"
                                        data-fa-transform="shrink-2"></i></span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-9">Title:</h5>
                                    <p class="text-break fs-10"><span id="modalTitle"></span></p>
                                </div>
                            </div>
                            <hr class="my-4" />

                            <div class="d-flex">
                                <span class="fa-stack ms-n1 me-3"><i
                                        class="fas fa-circle fa-stack-2x text-200"></i><i
                                        class="fa-inverse fa-stack-1x text-primary fas fa-align-left"
                                        data-fa-transform="shrink-2"></i></span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-9">Description:</h5>
                                    <p class="text-break fs-10"><span id="modalDescription"></span></p>
                                </div>
                            </div>
                            <hr class="my-4" />

                            <!-- Technician Assignment Section -->
                            <div class="d-flex">
                                <span class="fa-stack ms-n1 me-3"><i
                                        class="fas fa-circle fa-stack-2x text-200"></i><i
                                        class="fa-inverse fa-stack-1x text-primary fas fa-align-left"
                                        data-fa-transform="shrink-2"></i></span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-9">Assign a Technician:</h5>
                                    <form id="assignTechnicianForm">
                                        <select name="technician" id="modalTechnician" class="form-control">
                                            <option value="">Select Technician</option>
                                            <!-- Technician options will be loaded dynamically -->
                                        </select>
                                        <button type="button" id="assignTechnicianBtn" class="btn btn-primary mt-3">
                                            Assign
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End -->


                    <div class="card-footer bg-body-tertiary py-2 text-center"><a
                            class="btn btn-link btn-sm px-0 fw-medium" href="#!">View all report<span
                                class="fas fa-chevron-right ms-1 fs-11"></span></a></div>

                </div>

                <footer class="footer">
                    <div class="row g-0 justify-content-between fs-10 mt-4 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">Thank you for creating with Falcon <span
                                    class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2024 &copy; <a
                                    href="https://themewagon.com">Themewagon</a></p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">v3.20.0</p>
                        </div>
                    </div>
                </footer>
            </div>

        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


   


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../../vendors/popper/popper.min.js"></script>
    <script src="../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../vendors/is/is.min.js"></script>
    <script src="../../vendors/echarts/echarts.min.js"></script>
    <script src="../../vendors/dayjs/dayjs.min.js"></script>
    <script src="../../vendors/flatpickr/flatpickr.min.js"></script>
    <script src="../../vendors/fontawesome/all.min.js"></script>
    <script src="../../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../../vendors/list.js/list.min.js"></script>
    <script src="../../assets/js/theme.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize List.js
            var options = {
                valueNames: ['ticket_no', 'category', 'title', 'description', 'priority', 'status', 'date']
            };

            var userTicketsList = new List('TableUserTickets', options);

            console.log('List.js initialized:', userTicketsList);

            // Dropdown filtering
            document.querySelector('select[data-list-filter]').addEventListener('change', function () {
                var filterValue = this.value;
                console.log('Selected filter value:', filterValue);

                if (filterValue === "") {
                    userTicketsList.filter();
                    console.log('No filter applied');
                } else {
                    userTicketsList.filter(function (item) {
                        // Extract the priority value from the span element
                        var priorityValue = item.elm.querySelector('.priority span').textContent.trim();
                        console.log('Item priority:', priorityValue);
                        return priorityValue === filterValue.trim();
                    });
                    console.log('Filter applied:', filterValue);
                }
            });
        });


    </script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var descriptionModal = document.getElementById('descriptionModal');

    descriptionModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;  // Button that triggered the modal
        var ticketNo = button.getAttribute('data-ticket-no');
        var title = button.getAttribute('data-title');
        var description = button.getAttribute('data-description');

        // Insert data into the modal
        var modalTicketNo = descriptionModal.querySelector('#modalTicketNo');
        var modalTitle = descriptionModal.querySelector('#modalTitle');
        var modalDescription = descriptionModal.querySelector('#modalDescription');
        modalTicketNo.textContent = ticketNo;
        modalTitle.textContent = title;
        modalDescription.textContent = description;

        // Load technician data from the query (AJAX call to backend)
        fetch('getTechnicians.php')
            .then(response => response.json())
            .then(data => {
                var technicianSelect = document.getElementById('modalTechnician');
                technicianSelect.innerHTML = '<option value="">Select Technician</option>';
                data.forEach(function(technician) {
                    var option = document.createElement('option');
                    option.value = technician.name;
                    option.textContent = technician.name + ' - ' + technician.category;
                    technicianSelect.appendChild(option);
                });
            });
    });

    // Handle Assign button click
    document.getElementById('assignTechnicianBtn').addEventListener('click', function() {
        var technician = document.getElementById('modalTechnician').value;
        var ticketNo = document.getElementById('modalTicketNo').textContent;

        if (technician) {
            // Perform an AJAX call to save the assignment
            fetch('assignTechnician.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ technician: technician, ticketNo: ticketNo })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Technician assigned successfully.');
                    descriptionModal.querySelector('.btn-close').click();  // Close the modal
                } else {
                    alert('Error assigning technician.');
                }
            });
        } else {
            alert('Please select a technician.');
        }
    });
});
</script>

<script>
    $(document).ready(function() {
        // Handle the Resolve Button
        $(document).on('click', '.resolve-button', function() {
            var ticketNo = $(this).data('ticket-no');
            updateTicketStatus(ticketNo, 'RESOLVED');
        });

        // Handle the Reject Button - Open the Modal
        $(document).on('click', '.reject-button', function() {
            var ticketNo = $(this).data('ticket-no');
            $('#ticketNo').val(ticketNo);  // Set ticket number in hidden field
            $('#rejectRemarkModal').modal('show');
        });

        // Handle the Reject Remark Form Submission
        $('#rejectRemarkForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            var ticketNo = $('#ticketNo').val();
            var rejectRemark = $('#rejectRemark').val();

            // Ensure that rejectRemark is not empty
            if (rejectRemark.trim() === '') {
                alert('Please provide a remark for rejection.');
                return;
            }

            updateTicketStatus(ticketNo, 'REJECTED', rejectRemark);
        });

        // Generalized function for updating ticket status
        function updateTicketStatus(ticketNo, status, rejectRemark = '') {
            $.ajax({
                url: 'update_ticket_status.php', // PHP backend file
                type: 'POST',
                dataType: 'json',
                data: {
                    ticket_no: ticketNo,
                    status: status,
                    reject_remark: rejectRemark // Optional field for rejection
                },
                success: function(response) {
                    if (response.success) {
                        alert('Ticket status updated successfully.');
                        $('#rejectRemarkModal').modal('hide'); // Hide modal after success
                        location.reload(); // Refresh the page
                    } else {
                        alert('Failed to update ticket status: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('AJAX Error: ' + error);
                }
            });
        }
    });
</script>


</body>

</html>