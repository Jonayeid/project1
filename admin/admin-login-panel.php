<?php
session_start();
include('../db_connect.php');
$error = NULL;
if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = MD5($_POST["password"]);
    //echo $password;
    // exit();
    $sql = "SELECT * FROM admin where email='$email' and password='$password'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["id"];
            $admin_name = $row["name"];
            $admin_type = $row["type"];
        }
        // echo $type;
        // exit();
        $sql1 = "UPDATE admin SET login='1' WHERE id=$id";
        if ($conn->query($sql1) === TRUE) {
            $_SESSION['admin_id'] = $id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_type'] = $admin_type;
            header("location:dashboard/index.php");
        } else {
            $error = "Error updating record: " . $conn->error;
        }
    } else {
        $error = "Password Has Not Matched !! Please try Again ? ";
    }
}
?>
<html>
    <head>
        <link href="../style.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body id="LoginForm">
        <div class="container">
            <h1 class="form-heading"> Admin login Form</h1>
            <a href="admin/admin-login-panel.php"> Admin Login</a> <br/>
            <a href="index.php"> User Login</a>
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>Admin Login</h2>
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

                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Login</button>

                    </form>
                </div>
                <!--<p class="botto-text"> Designed by Code Tree</p>-->
            </div></div></div>


</body>
</html>
