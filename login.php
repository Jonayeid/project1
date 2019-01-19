<?php
include ('controller/loginController.php');
$ctlr = new loginController;
$error = NULL;
if (isset($_POST['submit'])) {
    $ctlr->logincheck($_POST);
}
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body id="LoginForm">
        <div class="container">
            <h1 class="form-heading">login Form</h1>
            <a href="admin/admin-login-panel.php">Admin Login</a>
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>User Login</h2>
                        <p>Please enter your email and password</p>
                        <span style="color:red;"><?php
                            if ($error != NULL) {
                                echo "Warning !" . $error;
                                $error = NULL;
                            }
                            ?> </span>
                    </div>
                    <form id="Login" method="post" action="">

                        <div class="form-group">


                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address">

                        </div>

                        <div class="form-group">

                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">

                        </div>
                        <div class="forgot">
                            <a href="reset.html">Forgot password?</a>
                            <a href="register.php">Register New Account !!</a>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Login</button>

                    </form>
                </div>
            <!--<p class="botto-text"> Designed by Code Tree</p>-->
            </div></div></div>


</body>
</html>
