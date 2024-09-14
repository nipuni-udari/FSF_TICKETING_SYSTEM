<?php
ini_set('display_errors', 'On');
session_start(); // Start the session

include('connect.php');
include('SERVICE_DESK_connect.php');

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from form 
    $mobile = mysqli_real_escape_string($conn, $_POST['usermobile']);
    $password = mysqli_real_escape_string($conn, $_POST['userpassword']);

    $sql = "SELECT * FROM EMB_DB WHERE Mobile = '$mobile' AND PIN = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count >= 1) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['NAME'];
        $hris_no = $row['HRIS_NO'];

        // Set session variables
        $_SESSION['login_user'] = $mobile;
        $_SESSION['login_name'] = $name;
        $_SESSION['hris_no'] = $hris_no;

        // Check if HRIS_NO matches and PAGE_REDIRECT_PRIVILLEDGE is 20
        $redirect_sql = "
            SELECT PAGE_REDIRECT 
            FROM PAGE_REDIRECT 
            WHERE EMB_DB_HRIS = '$hris_no' AND PAGE_REDIRECT_PRIVILLEDGE = 20";
        $redirect_result = mysqli_query($serviceDesk_conn, $redirect_sql);

        if (mysqli_num_rows($redirect_result) > 0) {
            $redirect_row = mysqli_fetch_assoc($redirect_result);
            $redirect_url = $redirect_row['PAGE_REDIRECT'];

            // Redirect to PAGE_REDIRECT URL
            header("Location: $redirect_url");
            exit();
        } else {
            // Redirect to default fsf_user.php if conditions are not met
            header("Location: fsf_user.php");
            exit();
        }

    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>



<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../../assets/js/config.js"></script>
    <script src="../../vendors/simplebar/simplebar.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="../../vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link href="../../assets/css/theme-rtl.css" rel="stylesheet" id="style-rtl">
    <link href="../../assets/css/theme.css" rel="stylesheet" id="style-default">
    <link href="../../assets/css/user-rtl.css" rel="stylesheet" id="user-style-rtl">
    <link href="../../assets/css/user.css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-9/assets/css/login-9.css">

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

    <main>
        <section class="bg-primary py-3 py-md-5 py-xl-8">
            <div class="container">
                <div class="row gy-4 align-items-center">
                    <div class="col-12 col-md-6 col-xl-7">
                        <div class="d-flex justify-content-center text-bg-primary">
                            <div class="col-12 col-xl-9">
                                <img class="img-fluid rounded mb-4" loading="lazy"
                                    src="../../assets/img/icons/spot-illustrations/login.svg" width="240" height="50"
                                    alt="login">
                                <hr class="border-primary-subtle mb-4">
                                <h2 class="h1 mb-4">We solve your tickets that struggling you.</h2>
                                <p class="lead mb-5">You can see what happens to your tickets and manage them
                                    effortlessly with our intuitive system</p>
                                <div class="text-endx">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor"
                                        class="bi bi-grip-horizontal" viewBox="0 0 16 16">
                                        <path
                                            d="M2 8a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm3 3a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm0-3a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5">
                        <div class="card border-0 rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <h3>Sign in</h3>
                                            <p>Don't have an account? <a href="#!">Sign up</a></p>
                                        </div>
                                    </div>
                                </div>
                                <form action="" method="post">
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="mobile" class="form-control" name="usermobile"
                                                    id="usermobile" placeholder="0700000000" required>
                                                <label for="usermobile" class="form-label">Mobile Number</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control" name="userpassword"
                                                    id="userpassword" value="" placeholder="Password" required>
                                                <label for="userpassword" class="form-label">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    name="remember_me" id="remember_me">
                                                <label class="form-check-label text-secondary" for="remember_me">
                                                    Keep me logged in
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-lg" type="submit">Log in</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php if ($error != '') { ?>
                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="../../vendors/popper/popper.min.js"></script>
    <script src="../../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../../vendors/anchorjs/anchor.min.js"></script>
    <script src="../../vendors/is/is.min.js"></script>
    <script src="../../vendors/tinymce/tinymce.min.js"></script>
    <script src="../../vendors/fontawesome/all.min.js"></script>
    <script src="../../vendors/lodash/lodash.min.js"></script>
    <script src="../../vendors/list.js/list.min.js"></script>
    <script src="../../assets/js/theme.js"></script>

</body>

</html>