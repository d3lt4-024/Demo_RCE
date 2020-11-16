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
        if(isset($_POST["ticket"]) && !empty($_POST["ticket"]))
        {
            if($_SESSION["form_token"]===$_POST["token"]) {
                unset($_SESSION['form_token']);
                $_SESSION["form_token"] = md5(uniqid(rand(), true));
                $ticket = unserialize(base64_decode($_POST["ticket"]));
                $username = $ticket->name;
                $secret_number = $ticket->secret_number;
                $count = check_user_exists($conn, $username);
                if($count === 1)
                {
                    if(check_length($secret_number, 9)) {
                        $secret_number = strtoupper($secret_number);
                        $secret_number = check_string($secret_number);
                        $secret = get_secret($conn,$username);
                        if($secret_number !== $secret) {
                            print("Wrong secret!");
                        }
                        else
                        {
                            print("OK, we will send you the new password");}
                        $random_rand = rand(0,$secret_number);
                        srand($random_rand);
                        $new_password = "";
                        while(strlen($new_password) < 30) {
                            $new_password .= strval(rand());
                        }
                        reset_password($conn, $username, $new_password);
                        //to do: send mail the new password to the user, code later
                        //print($new_password);
                    }
                    else
                    {
                        print("<center>IMPOSTOR ALERT!!!!</center>");
                    }
                }
                else
                {
                    //print $count;
                    print("<center>IMPOSTOR ALERT!!!!</center>");
                }
            }
            else
            {
                print("<center>WRONG TICKET</center>");
            }
        }

        ?>
        <!-- /.navbar-header -->
        <form action="?page=forgot" method="POST" class="form-material">
            <center>Please send us the reset ticket to reset your password!</center><br>
            <div class="form-group">
                <input type="text" placeholder="Your Ticket" class="form-control form-control-line" name="ticket"
                       id="input1">
                <label for="ticket">Ticket</label>
            </div>
            <div class="form-group">
                <input type="hidden"
                       name="token" value="<?php $token = $_SESSION['form_token']; echo $token; ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-block btn-lg btn-color-scheme ripple" type="submit" value="send" name="send">
                    Send
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

