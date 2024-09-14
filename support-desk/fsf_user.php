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
    <title>FSF Ticketing</title>


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
                            <span class="font-sans-serif text-primary">FSF Ticketing</span>
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


                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">Make a Ticket</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="../../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                        alt="View Badge User">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg mt-6" role="document">
                            <div class="modal-content border-0">
                                <div class="position-absolute top-0 end-0 mt-3 me-3 z-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base"
                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="hoverbox rounded-3">

                                    <div class="hoverbox-content p-5 flex-center" style="background-color: #3c4761;"
                                        data-bs-theme="dark">
                                    </div>

                                    <div class="modal-body p-0">
                                        <div class="rounded-top-3 bg-body-tertiary py-3 ps-4 pe-6">
                                            <h4 class="mb-1 text-primary" id="staticBackdropLabel">Add a new Ticket</h4>
                                        </div>
                                        <div class="p-4">
                                            <div class="row">
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="d-flex">
                                                                <span class="fa-stack ms-n1 me-3">
                                                                    <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                                    <i class="fa-inverse fa-stack-1x text-primary fas fa-address-card"
                                                                        data-fa-transform="shrink-2"></i>
                                                                </span>
                                                                <div class="flex-1">
                                                                    <h5 class="mb-2 fs-9">HRIS NO</h5>
                                                                    <div class="mb-3">
                                                                        <input class="form-control" id="hrisNo"
                                                                            type="number"
                                                                            value="<?php echo $hris_no; ?>" readonly
                                                                            required>
                                                                    </div>
                                                                    <hr class="my-4" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="d-flex">
                                                                <span class="fa-stack ms-n1 me-3">
                                                                    <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                                    <i class="fa-inverse fa-stack-1x text-primary fas fa-user"
                                                                        data-fa-transform="shrink-2"></i>
                                                                </span>
                                                                <div class="flex-1">
                                                                    <h5 class="mb-2 fs-9">Name</h5>
                                                                    <div class="mb-3">
                                                                        <input class="form-control" id="username"
                                                                            name="username"
                                                                            value="<?php echo $user_name; ?>" readonly
                                                                            required>
                                                                    </div>
                                                                    <hr class="my-4" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="fa-stack ms-n1 me-3">
                                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                            <i class="fa-inverse fa-stack-1x text-primary fas fa-list"
                                                                data-fa-transform="shrink-2"></i>
                                                        </span>
                                                        <div class="flex-1">
                                                            <h5 class="mb-2 fs-9">Category</h5>
                                                            <select class="form-select" aria-label="category" required>
                                                                <option value="" selected>Select the relevant category
                                                                </option>
                                                                <option value="TV">TV</option>
                                                                <option value="Computers">Computers</option>
                                                                <option value="Mobile phones">Mobile phones</option>
                                                                <option value="Tabs">Tabs</option>
                                                                <option value="Electronics">Electronics</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                            <hr class="my-4" />
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="fa-stack ms-n1 me-3">
                                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                            <i class="fa-inverse fa-stack-1x text-primary fas fa-heading"
                                                                data-fa-transform="shrink-2"></i>
                                                        </span>
                                                        <div class="flex-1">
                                                            <h5 class="mb-2 fs-9">Title</h5>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="title" rows="3"
                                                                    required></textarea>
                                                            </div>
                                                            <hr class="my-4" />
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="fa-stack ms-n1 me-3">
                                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                            <i class="fa-inverse fa-stack-1x text-primary fas fa-tag"
                                                                data-fa-transform="shrink-2"></i>
                                                        </span>
                                                        <div class="d-flex">
                                                            <div class="flex-1">
                                                                <h5 class="mb-2 fs-9">Priority level</h5>
                                                                <div class="d-flex justify-content-between">
                                                                    <span id="selected-label" class="badge">add
                                                                        label</span>
                                                                    <div class="dropdown dropend ml-3">
                                                                        <button
                                                                            class="btn btn-sm btn-secondary px-2 fsp-75 bg-400 border-400 dropdown-toggle dropdown-caret-none"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-haspopup="true" aria-expanded="false">
                                                                            <span class="fas fa-plus"></span>
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <h6 class="dropdown-header py-0 px-3 mb-0">
                                                                                Select Priority</h6>
                                                                            <div class="dropdown-divider"></div>
                                                                            <div class="px-3">
                                                                                <button
                                                                                    class="badge-subtle-danger dropdown-item rounded-1 mb-2"
                                                                                    type="button"
                                                                                    onclick="selectLabel('High', 'badge-subtle-danger')">High</button>
                                                                                <button
                                                                                    class="badge-subtle-primary dropdown-item rounded-1 mb-2"
                                                                                    type="button"
                                                                                    onclick="selectLabel('Medium', 'badge-subtle-primary')">Medium</button>
                                                                                <button
                                                                                    class="badge-subtle-success dropdown-item rounded-1 mb-2"
                                                                                    type="button"
                                                                                    onclick="selectLabel('Low', 'badge-subtle-success')">Low</button>
                                                                            </div>
                                                                            <div class="dropdown-divider">
                                                                        
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr class="my-4" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <span class="fa-stack ms-n1 me-3">
                                                            <i class="fas fa-circle fa-stack-2x text-200"></i>
                                                            <i class="fa-inverse fa-stack-1x text-primary fas fa-align-left"
                                                                data-fa-transform="shrink-2"></i>
                                                        </span>
                                                        <div class="flex-1">
                                                            <h5 class="mb-2 fs-9">Description</h5>
                                                            <div class="mb-3">
                                                                <textarea class="form-control" id="description" rows="3"
                                                                    required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" onclick="submitTicket()">Add
                                                new ticket</button>
                                        </div>
                                    </div>


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
                    // Query to fetch data from FSF_TICKETING_USER where HRIS_NO matches the session HRIS_NO
                    $query = "SELECT TICKET_NO, CATEGORY, TITLE, PRIORITY, DESCRIPTION, TICKET_STATUS, TICKET_CREATED_DATE 
            FROM FSF_TICKETING_USER 
            WHERE HRIS_NO = '$hris_no'";
                    $result = mysqli_query($conn, $query);
                    ?>

                    <div class="card-body">
                        <div id="TableUserTickets"
                            data-list='{"valueNames":["ticket_no","category","title","description","priority","status","date"],"filter":{"key":"priority"},"page":5,"pagination":true}'>

                            <!-- Search and Filter Bar -->
                            <div class="row justify-content-between g-0 mb-3">
                                <div class="col-auto">
                                    <form>
                                        <div class="input-group">
                                            <input class="form-control form-control-sm shadow-none search" type="search"
                                                placeholder="Search..." aria-label="search"
                                                data-list-search="data-list-search" />
                                            <div class="input-group-text bg-transparent">
                                                <span class="fa fa-search fs-10 text-600"></span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select form-select-sm mb-3" aria-label="Bulk actions"
                                        data-list-filter="data-list-filter">
                                        <option selected="" value="">Select Ticket Priority</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Table Content -->
                            <div class="table-responsive scrollbar">
                                <table class="table table-sm table-striped fs-10 mb-0 overflow-hidden">
                                    <thead class="bg-200">
                                        <tr>
                                            <th class="text-900 sort pe-1 align-middle white-space-nowrap"
                                                data-sort="ticket_no">TICKET NO</th>
                                            <th class="text-900 sort pe-1 align-middle white-space-nowrap"
                                                data-sort="category">CATEGORY</th>
                                            <th class="text-900 sort pe-1 align-middle white-space-nowrap"
                                                data-sort="title">TITLE</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="description">DESCRIPTION</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="priority">PRIORITY</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="status">TICKET STATUS</th>
                                            <th class="text-900 sort align-middle white-space-nowrap text-end pe-4"
                                                data-sort="date">TICKET CREATED DATE</th>
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

                                                echo '<tr class="btn-reveal-trigger">';
                                                echo '<td class="align-middle white-space-nowrap" data-sort="ticket_no">' . $row['TICKET_NO'] . '</td>';

                                                echo '<td class="align-middle white-space-nowrap">' . $row['CATEGORY'] . '</td>';
                                                echo '<td class="align-middle white-space-nowrap">' . $row['TITLE'] . '</td>';
                                                echo '<td class="align-middle white-space-nowrap text-end">
                                    <a href="#" class="text-decoration-underline" data-bs-toggle="modal" data-bs-target="#descriptionModal" data-description="' . htmlspecialchars($row['DESCRIPTION']) . '">View</a>
                                  </td>';
                                                echo '<td class="align-middle white-space-nowrap text-end priority">
                                    <span class="badge badge rounded-pill ' . $badgeClass . '">' . $row['PRIORITY'] . '</span>
                                  </td>';
                                                echo '<td class="align-middle white-space-nowrap text-end">' . $row['TICKET_STATUS'] . '</td>';
                                                echo '<td class="align-middle white-space-nowrap text-end">' . $row['TICKET_CREATED_DATE'] . '</td>';
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo '<tr><td colspan="7" class="text-center">No tickets found</td></tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                                <ul class="pagination mb-0"></ul>
                                <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                                    data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for displaying description -->
                    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="descriptionModalLabel">Ticket Description</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Description will be inserted here by JavaScript -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


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
            <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog"
                aria-labelledby="authentication-modal-label" aria-hidden="true">
                <div class="modal-dialog mt-6" role="document">
                    <div class="modal-content border-0">
                        <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                            <div class="position-relative z-1">
                                <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                                <p class="fs-10 mb-0 text-white">Please create your free Falcon account</p>
                            </div>
                            <button class="btn-close position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4 px-5">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label" for="modal-auth-name">Name</label>
                                    <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="modal-auth-email">Email address</label>
                                    <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                                </div>
                                <div class="row gx-2">
                                    <div class="mb-3 col-sm-6">
                                        <label class="form-label" for="modal-auth-password">Password</label>
                                        <input class="form-control" type="password" autocomplete="on"
                                            id="modal-auth-password" />
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <label class="form-label" for="modal-auth-confirm-password">Confirm
                                            Password</label>
                                        <input class="form-control" type="password" autocomplete="on"
                                            id="modal-auth-confirm-password" />
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                                    <label class="form-label" for="modal-auth-register-checkbox">I accept the <a
                                            href="#!">terms </a>and <a class="white-space-nowrap" href="#!">privacy
                                            policy</a></label>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100 mt-3" type="submit"
                                        name="submit">Register</button>
                                </div>
                            </form>
                            <div class="position-relative mt-5">
                                <hr />
                                <div class="divider-content-center">or register with</div>
                            </div>
                            <div class="row g-2 mt-2">
                                <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100"
                                        href="#"><span class="fab fa-google-plus-g me-2"
                                            data-fa-transform="grow-8"></span> google</a></div>
                                <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100"
                                        href="#"><span class="fab fa-facebook-square me-2"
                                            data-fa-transform="grow-8"></span> facebook</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1"
        aria-labelledby="settings-offcanvas">
        <div class="offcanvas-header settings-panel-header bg-shape">
            <div class="z-1 py-1">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h5 class="text-white mb-0 me-2"><span class="fas fa-palette me-2 fs-9"></span>Settings</h5>
                    <button class="btn btn-primary btn-sm rounded-pill mt-0 mb-0" data-theme-control="reset"
                        style="font-size:12px"> <span class="fas fa-redo-alt me-1"
                            data-fa-transform="shrink-3"></span>Reset</button>
                </div>
                <p class="mb-0 fs-10 text-white opacity-75"> Set your own customized style</p>
            </div>
            <div class="z-1" data-bs-theme="dark">
                <button class="btn-close z-1 mt-0" type="button" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
        </div>
        <div class="offcanvas-body scrollbar-overlay px-x1 h-100" id="themeController">
            <h5 class="fs-9">Color Scheme</h5>
            <p class="fs-10">Choose the perfect color mode for your app.</p>
            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-4">
                        <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light"
                            data-theme-control="theme" />
                        <label class="btn d-inline-block btn-navbar-style fs-10" for="themeSwitcherLight"> <span
                                class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                    src="../../assets/img/generic/falcon-mode-default.jpg" alt="" /></span><span
                                class="label-text">Light</span></label>
                    </div>
                    <div class="col-4">
                        <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark"
                            data-theme-control="theme" />
                        <label class="btn d-inline-block btn-navbar-style fs-10" for="themeSwitcherDark"> <span
                                class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                    src="../../assets/img/generic/falcon-mode-dark.jpg" alt="" /></span><span
                                class="label-text"> Dark</span></label>
                    </div>
                    <div class="col-4">
                        <input class="btn-check" id="themeSwitcherAuto" name="theme-color" type="radio" value="auto"
                            data-theme-control="theme" />
                        <label class="btn d-inline-block btn-navbar-style fs-10" for="themeSwitcherAuto"> <span
                                class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0"
                                    src="../../assets/img/generic/falcon-mode-auto.jpg" alt="" /></span><span
                                class="label-text"> Auto</span></label>
                    </div>
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="me-2"
                        src="../../assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-9">RTL Mode</h5>
                        <p class="fs-10 mb-0">Switch your language direction </p><a class="fs-10"
                            href="../../documentation/customization/configuration.html">RTL Documentation</a>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
                </div>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-start"><img class="me-2" src="../../assets/img/icons/arrows-h.svg"
                        width="20" alt="" />
                    <div class="flex-1">
                        <h5 class="fs-9">Fluid Layout</h5>
                        <p class="fs-10 mb-0">Toggle container layout system </p><a class="fs-10"
                            href="../../documentation/customization/configuration.html">Fluid Documentation</a>
                    </div>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
                </div>
            </div>
            <hr />
            <div class="d-flex align-items-start"><img class="me-2" src="../../assets/img/icons/paragraph.svg"
                    width="20" alt="" />
                <div class="flex-1">
                    <h5 class="fs-9 d-flex align-items-center">Navigation Position</h5>
                    <p class="fs-10 mb-2">Select a suitable navigation system for your web application </p>
                    <div>
                        <select class="form-select form-select-sm" aria-label="Navbar position"
                            data-theme-control="navbarPosition">
                            <option value="vertical"
                                data-page-url="../../modules/components/navs-and-tabs/vertical-navbar.html">Vertical
                            </option>
                            <option value="top" data-page-url="../../modules/components/navs-and-tabs/top-navbar.html">
                                Top</option>
                            <option value="combo"
                                data-page-url="../../modules/components/navs-and-tabs/combo-navbar.html">Combo</option>
                            <option value="double-top"
                                data-page-url="../../modules/components/navs-and-tabs/double-top-navbar.html">Double Top
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <hr />
            <h5 class="fs-9 d-flex align-items-center">Vertical Navbar Style</h5>
            <p class="fs-10 mb-0">Switch between styles for your vertical navbar </p>
            <p> <a class="fs-10" href="../../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See
                    Documentation</a></p>
            <div class="btn-group d-block w-100 btn-group-navbar-style">
                <div class="row gx-2">
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle"
                            value="transparent" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-transparent"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/default.png"
                                alt="" /><span class="label-text"> Transparent</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle"
                            value="inverted" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-inverted"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/inverted.png"
                                alt="" /><span class="label-text"> Inverted</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card"
                            data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-card"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/card.png" alt="" /><span
                                class="label-text"> Card</span></label>
                    </div>
                    <div class="col-6">
                        <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle"
                            value="vibrant" data-theme-control="navbarStyle" />
                        <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-vibrant"> <img
                                class="img-fluid img-prototype" src="../../assets/img/generic/vibrant.png"
                                alt="" /><span class="label-text"> Vibrant</span></label>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5"><img class="mb-4" src="../../assets/img/icons/spot-illustrations/47.png"
                    alt="" width="120" />
                <h5>Like What You See?</h5>
                <p class="fs-10">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a
                    class="mb-3 btn btn-primary"
                    href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/"
                    target="_blank">Purchase</a>
            </div>
        </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
        <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
            <div class="bg-primary-subtle position-relative rounded-start" style="height:34px;width:28px">
                <div class="settings-popover"><span class="ripple"><span
                            class="fa-spin position-absolute all-0 d-flex flex-center"><span
                                class="icon-spin position-absolute all-0 d-flex flex-center">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z"
                                        fill="#2A7BE4"></path>
                                </svg></span></span></span></div>
            </div><small
                class="text-uppercase text-primary fw-bold bg-primary-subtle py-2 pe-2 ps-1 rounded-end">customize</small>
        </div>
    </a>


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
        function selectLabel(label, badgeClass) {
            document.getElementById('selected-label').innerText = label;
            document.getElementById('selected-label').className = `badge ${badgeClass}`;
        }

        function submitTicket() {
            var hrisNo = document.querySelector('#hrisNo').value;
            var userName = document.querySelector('#username').value;
            var category = document.querySelector('[aria-label="category"]').value;
            var title = document.querySelector('#title').value;
            var priority = document.getElementById('selected-label').innerText;
            var description = document.querySelector('#description').value;

            // Check all required fields
            if (!hrisNo) {
                alert('HRIS No is required');
                return;
            }
            if (!userName) {
                alert('Name is required');
                return;
            }
            if (!category || category === 'Select the relevant category') {
                alert('Category is required');
                return;
            }
            if (!title) {
                alert('Title is required');
                return;
            }
            if (priority === 'add label') {
                alert('Please select a priority level');
                return;
            }
            if (!description) {
                alert('Description is required');
                return;
            }

            var data = new FormData();
            data.append('hrisNo', hrisNo);
            data.append('userName', userName);
            data.append('category', category);
            data.append('title', title);
            data.append('priority', priority);
            data.append('description', description);

            fetch('save_ticket.php', {
                method: 'POST',
                body: data
            })
                .then(response => response.text())
                .then(result => {
                    if (result.trim() === 'success') {
                        alert('Successfully saved the ticket');
                        location.reload();
                    } else {
                        alert('Error: ' + result);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>


    <script>
        // JavaScript to load description into the modal
        var descriptionModal = document.getElementById('descriptionModal');
        descriptionModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var description = button.getAttribute('data-description');
            var modalBody = descriptionModal.querySelector('.modal-body');
            modalBody.textContent = description;
        });
    </script>

</body>

</html>