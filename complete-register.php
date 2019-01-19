<?php
session_start();
include('db_connect.php');
$error = NULL;

if($_SESSION['seller_id'] == NULL){
     header("location:register.php");
}


if (isset($_POST['submit'])) {
    $bkash_number = $_POST["bkash_number"];
    $seller_id = $_POST["seller_id"];
    $transaction_id = $_POST["transaction_id"];
    $agree = $_POST["agree"];
    $sql = "INSERT INTO sellerpayment(seller_id, bkash_number, transaction_id) VALUES ('$seller_id', '$bkash_number', '$transaction_id')";
    if ($conn->query($sql) === TRUE) {
        $sql1 = "UPDATE user SET status='1' WHERE id=$seller_id";
        if ($conn->query($sql1) === TRUE) {
            header("location:my-profile.php");
        } else {
            $error =  "Error updating record: " . $conn->error;
        }     
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <body id="LoginForm">
        <div class="container">
            <h1 class="form-heading">Register Form</h1>
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>Complete Your Registration</h2>
                        <p>Follow the instruction </p>
                        <span style="color:red;"><?php
                            if ($error != NULL) {
                                echo "Warning !" . $error;
                                $error = NULL;
                            }
                            ?> </span>
                    </div>

                    <div class="panel">

                        <span class=""><i class="fa fa-lock"></i></span>
                        <span class="title">Rules and regulations !</span>
                        <ul>
                            <li>Always meet the seller in person</li>
                            <li>Don't pay for anything until you have seen what you are getting</li>
                            <li>Don't send or wire money to anyone you don't know</li>
                        </ul>
                    </div>
                    <form id="Login" method="post" action="">

                        <div class="form-group">


                            <input type="number" name="bkash_number" class="form-control" id="inputEmail" placeholder="Your Bkash Number" required>
                            <input type="hidden" value="<?php echo $_SESSION['seller_id']; ?>" name="seller_id"/>
                        </div>

                        <div class="form-group">

                            <input type="text" name="transaction_id" class="form-control" id="inputPassword" placeholder="Tensaction Number" required>

                        </div>
                        <div class="form-group">

                            <input type="checkbox" name="agree" id="agree" onclick="agree()" value="1" required/> Check the term for agreement !!

                        </div>

                        <div class="forgot">

                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Complete Registration</button>

                    </form>
                </div>
                <!--<p class="botto-text"> Designed by Code Tree</p>-->
            </div></div></div>


</body>
</html>
