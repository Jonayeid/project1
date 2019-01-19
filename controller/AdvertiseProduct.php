<?php

class AdvertiseProduct {

    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $dbname = "db_codetree";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function save_advertise_product($ob, $file) {
        $product_name = $ob["product_name"];
        $seller_id = $ob["seller_id"];
        $category_id = $ob["category_id"];
        $product_price = $ob["product_price"];
        $product_description = $ob["product_description"];
        $product_qty = $ob["product_qty"];
        $product_weight = $ob["product_weight"];
        // $product_img = $_POST["product_img"];

        $target_dir = "uploads/";
        $rand = rand(1, 1000000);
        $image = $rand . basename($file["product_img"]["name"]);
        //echo $image;
        //exit();
        $target_file = $target_dir . $image;
        //echo $target_file;
        //exit();
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

        $check = getimagesize($file["product_img"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $error = "File is not an image.";
            $uploadOk = 0;
        }
        // exit();
// Check if file already exists
// Check file size
        if ($file["product_img"]["size"] > 500000) {
            $error = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $error = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["product_img"]["tmp_name"], $target_file)) {

                //echo "The file " . basename($_FILES["product_img"]["name"]) . " has been uploaded." . $target_file;
                $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                $time = $dt->format('g:i A F j, Y');
                //echo $time;
                //exit();
                $sql = "INSERT INTO sellerproduct(seller_id, product_name, category_id, product_price, product_description, product_qty, product_weight, product_img, time) "
                        . "VALUES ('$seller_id', '$product_name', '$category_id', '$product_price', '$product_description', '$product_qty', '$product_weight', '$target_file', '$time')";
                if ($this->conn->query($sql) === TRUE) {
                    $last_id = $this->conn->insert_id;
                    $_SESSION['productId'] = $last_id;
                    header("location:confirm-advertise.php");
                    //  $msg = "New record created successfully";
                } else {
                    $error = "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $error = "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function save_advertise_confirm($ob) {
        $bkash_number = $ob["bkash_number"];
        $seller_id = $ob["seller_id"];
        $transaction_id = $ob["transaction_id"];
        $agree = $ob["agree"];
        $productId = $ob["productId"];
        $sql = "INSERT INTO adpayment(seller_id, productId, bkash_number, transaction_id) VALUES ('$seller_id', '$productId','$bkash_number', '$transaction_id')";
        if ($this->conn->query($sql) === TRUE) {
            $_SESSION['msg'] = "Your Advertise has succefully saved ! Wait for admin response";
            header("location:my-profile.php");     
        } else {
            $error = "Error: ";
        }
    }

}
