<?php
session_start();
include('db_connect.php');
$error = NULL;
$msg = NULL;
$_SESSION['seller_id'] = NULL;
$_SESSION['buyer_id'] = NULL;


if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $type = $_POST["type"];
    $organize = $_POST["organize"];

    $sql = "SELECT id FROM user where email='$email'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $error = "Already Have an account in this email !! ";
        // output data of each row
        // while($row = mysqli_fetch_assoc($result)) {
        //    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        // }
    } else {
        if ($password == $confirm_password) {
            //echo "matcheed";
            $confirm_password = MD5($confirm_password);
            if ($type == 'Seller') {
                $sql = "INSERT INTO user(name, email, password,type,organize) VALUES ('$name', '$email', '$confirm_password', '$type', '$organize')";
                if ($conn->query($sql) === TRUE) {
                    //$msg = "New record created successfully";
                    $last_id = $conn->insert_id;
                    $_SESSION['seller_id'] = $last_id;
                    header("location:complete-register.php");
                } else {
                    $error = "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $sql = "INSERT INTO user(name, email, password,type,organize,status) VALUES ('$name', '$email', '$confirm_password', '$type', '$organize', '1')";
                if ($conn->query($sql) === TRUE) {
                    $last_id = $conn->insert_id;
                    $_SESSION['buyer_id'] = $last_id;
                    header("location:buyer-profile.php");
                } else {
                    $error = "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            $error = "Password Has Not Matched !! Please try Again ? ";
        }
    }
}
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <script type="text/javascript">


            window.addEventListener('load', function () {
                document.getElementById("organize").style.display = 'none';
            }, true);


            function Sellertype() {
                var type = document.getElementById("type").value;
                if (type == 'Seller') {
                    document.getElementById("organize").style.display = 'block';
                } else {
                    document.getElementById("organize").style.display = 'none';
                }
            }
        </script>  


    </head>
    <body id="LoginForm" onload="myFunction()">
        <div class="container">
            <h1 class="form-heading">Register Form</h1>
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>User Registration </h2>
                        <p>Please enter your information</p>

                        <span style="color:red;"><?php
if ($error != NULL) {
    echo "Warning !" . $error;
    $error = NULL;
}
?> </span> 
                        <span style="color:green;"><?php
                            if ($msg != NULL) {
                                echo $msg;
                                $msg = NULL;
                            }
?> </span>
                    </div>
                    <form id="Login" method="post" action="">

                        <div class="form-group">


                            <input type="name" name="name" class="form-control" id="inputEmail" placeholder="Full Name" required>

                        </div>
                        <div class="form-group">


                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address" required>

                        </div>
                        <div class="form-group">

                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>

                        </div>
                        <div class="form-group">

                            <input type="password" name="confirm_password" class="form-control" id="inputPassword" placeholder="Confirm Password" required>

                        </div>
                        <div class="form-group">

                            <select class="form-control" name="type" id="type" onchange="Sellertype()" required>
                                <option value="">Select User Type</option>
                                <option value="Seller">Seller</option>
                                <option value="Customer">Customer</option>
                            </select>


                        </div>
                        <div class="form-group" name="organize" id="organize">


                            <input type="name" name="organize" class="form-control" id="inputEmail" placeholder="Organize Name">

                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Regsiter</button>
                        <p>Already have an account? <a href="index.php">Login </a></p>
                    </form>
                </div>
                <!--<p class="botto-text"> Designed by Code Tree</p>-->
            </div>
        </div>



    </body>
</html>
