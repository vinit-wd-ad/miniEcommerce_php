<?php
include "setting.php";
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include "includes/head.php"; ?>
    <title><?= $webSetting['site_tagline'] ?? '' ?></title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="">
</head>

<body>

    <div class="main-wrapper">
        <?php include "includes/header.php"; ?>

        <?php include "includes/sidebar-cart.php"; ?>

        <div class="login-register-area pt-115 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ms-auto me-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-bs-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <?php
                            echo "<pre>";
                            print_r($_SESSION);
                            echo "</pre>";
                            ?>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form id="login-form">
                                                <input type="text" name="user-name" placeholder="Username">
                                                <input type="password" name="user-password" placeholder="Password">
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form id="register-form">
                                                <input type="text" name="user-name" placeholder="Username">
                                                <input type="password" name="user-password" placeholder="Password">
                                                <input name="user-email" placeholder="Email" type="email">
                                                <div class="button-box">
                                                    <button type="submit">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "components/subscribe-area.php" ?>

        <?php include "includes/footer.php"; ?>

        <?php include "components/modals.php" ?>
    </div>

    <?php include  "includes/script.php"; ?>

</body>

</html>