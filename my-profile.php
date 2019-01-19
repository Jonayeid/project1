<?php
session_start();
//include('db_connect.php');
$error = NULL;
$msg = NULL;
if($_SESSION['user_id'] == NULL){
     header("location:index.php");
}

//if (isset($_POST['submit'])) {
//    $product_name = $_POST["product_name"];
//    $category_id = $_POST["category_id"];
//    $product_price = $_POST["product_price"];
//    $product_description = $_POST["product_description"];
//    $product_qty = $_POST["product_qty"];
//    $product_weight = $_POST["product_weight"];
//    // $product_img = $_POST["product_img"];
//
//    $target_dir = "uploads/";
//    $rand = rand(1, 1000000);
//    $image = $rand . basename($_FILES["product_img"]["name"]);
//    //echo $image;
//    //exit();
//    $target_file = $target_dir . $image;
//    //echo $target_file;
//    //exit();
//    $uploadOk = 1;
//    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//// Check if image file is a actual image or fake image
//
//    $check = getimagesize($_FILES["product_img"]["tmp_name"]);
//    if ($check !== false) {
//        // echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        $error = "File is not an image.";
//        $uploadOk = 0;
//    }
//    // exit();
//// Check if file already exists
//// Check file size
//    if ($_FILES["product_img"]["size"] > 500000) {
//        $error = "Sorry, your file is too large.";
//        $uploadOk = 0;
//    }
//// Allow certain file formats
//    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//        $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//        $uploadOk = 0;
//    }
//// Check if $uploadOk is set to 0 by an error
//    if ($uploadOk == 0) {
//        $error = "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//    } else {
//        if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
//
//            //echo "The file " . basename($_FILES["product_img"]["name"]) . " has been uploaded." . $target_file;
//            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
//            $time = $dt->format('g:i A F j, Y');
//            //echo $time;
//            //exit();
//            $sql = "INSERT INTO sellerproduct(product_name, category_id, product_price, product_description, product_qty, product_weight, product_img, time) "
//                    . "VALUES ('$product_name', '$category_id', '$product_price', '$product_description', '$product_qty', '$product_weight', '$target_file', '$time')";
//            if ($conn->query($sql) === TRUE) {
//                $last_id = $conn->insert_id;
//                $_SESSION['productId'] = $last_id;
//                header("location:confirm-advertise.php");
//                //  $msg = "New record created successfully";
//            } else {
//                $error = "Error: " . $sql . "<br>" . $conn->error;
//            }
//        } else {
//            $error = "Sorry, there was an error uploading your file.";
//        }
//    }
//}
?>
<html>
    <head>
        <link href="style.css" rel="stylesheet" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

    </head>
    <body id="LoginForm" onload="myFunction()">
        <div class="container">
            <h1 class="form-heading">Post Your Advertise Form </h1>
               <a href="make-advertise.php">Make Advertise</a> <br/>
            <a href="buyer-message.php">Buyer Message</a> <br/>
             <a href="logout-seller.php">Logout</a>
            <div class="login-form">
              <span style="color:green;"><?php
                            if (isset($_SESSION['msg']) != NULL) {
                                echo $_SESSION['msg'];
                                $_SESSION['msg'] = NULL;
                            }
                            ?> </span>
                <!--<p class="botto-text"> Designed by Code Tree</p>-->
            </div>
        </div>
  


</body>
</html>
