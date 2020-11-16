<?php

if (!defined('check_access'))
{
    die("IMPOSTOR ALERT!!!");
}

?>
<?php

if(empty($_SESSION["form_token"]))
{
    $gen_token=md5(uniqid(rand(), true));
    $_SESSION["form_token"] = $gen_token;
}

?>
<body class="body-bg-full profile-page" style="background-image: url(/public/assets/demo/night.jpg)">
<div id="wrapper" class="row wrapper">
    <div class="col-10 ml-sm-auto col-sm-6 col-md-4 ml-md-auto login-center mx-auto">
        <div class="navbar-header text-center">
            <a href="index.php">
                <img alt="" src="/public/assets/demo/logo-expand-dark.png">
            </a>
        </div>
        <?php
        if(isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
            die("Hi ".$_SESSION["user"].", you had login successful");
        }
        ?>
        <?php
        if(isset($_POST["username"]) && !empty($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["password"]))
        {
            if($_SESSION["form_token"]===$_POST["token"]) {
                unset($_SESSION['form_token']);
                $_SESSION["form_token"] = md5(uniqid(rand(), true));

                $count = check_user_exists($conn, $_POST["username"]);
                if($count === 1)
                {
                    $test=md5($_POST["password"]);
                    if(md5($_POST["password"]) === get_password($conn, $_POST["username"]))
                    {
                        $_SESSION["user"] = $_POST["username"];
                        header("Refresh: 0");
                    }
                    else
                    {
                        print("<center>IMPOSTOR ALERT!!!</center>");
                    }
                }
                else
                {
                    print("<center>IMPOSTOR ALERT!!!</center>");
                }
            }
        }
        ?>
        <!-- /.navbar-header -->
        <form action="?page=login" method="POST" class="form-material">
            <div class="form-group">
                <input type="text" placeholder="Your Username" class="form-control form-control-line" name="username"
                       id="input1">
                <label for="username">Username</label>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Your Password" class="form-control form-control-line"
                       name="password" id="input1">
                <label>Password</label>
            </div>
            <div class="form-group">
                <input type="hidden"
                       name="token" value="<?php $token = $_SESSION['form_token']; echo $token; ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-lg btn-color-scheme ripple" type="submit" value="login" name="login">
                    Login
                </button>
            </div>
            <!-- /.login-center -->
    </div>
    <!-- /.body-container -->
    <!-- Scripts -->
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/public/assets/js/material-design.js"></script>

