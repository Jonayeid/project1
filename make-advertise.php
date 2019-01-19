<?php
session_start();
include('db_connect.php');
$error = NULL;
$msg = NULL;

if($_SESSION['user_id'] == NULL){
     header("location:index.php");
}
include ('controller/AdvertiseProduct.php');
$ctlr = new AdvertiseProduct();


if (isset($_POST['submit'])) {
     $ctlr->save_advertise_product($_POST,$_FILES);
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
    <body id="LoginForm" onload="myFunction()">
        <div class="container">
            <h1 class="form-heading">Post Your Advertise Form </h1>
            <a href="my-profile.php">My Account</a> <br/>
               <a href="make-advertise.php">Make Advertise</a> <br/>
            <a href="buyer-message.php">Buyer Message</a> <br/>
             <a href="logout-seller.php">Logout</a>
            <div class="login-form">
                <div class="main-div">
                    <div class="panel">
                        <h2>Post Your Advertise </h2>
                        <p>Please enter information</p>

                        <span style="color:red;"><?php
                            if ($error != NULL) {
                                echo "Warning !" . $error;
                                $error = NULL;
                            }
                            ?> </span> 
                        <span style="color:green;"><?php
                            if (isset($msg) != NULL) {
                                echo $msg;
                                $msg = NULL;
                            }
                            ?> </span>
                        
                        
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="form-group">


                            <input type="name" name="product_name" class="form-control" id="inputEmail" placeholder="Product Name">
                        <input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="seller_id"/>
                        </div> 
                        <div class="form-group">

                            <select class="form-control" name="category_id" id="type" onchange="Sellertype()" >
                                <option value="0">Select Category</option>
                                <option value="1">Category One</option>
                                <option value="2">Category Two</option>
                            </select>
                        </div>
                        <div class="form-group">


                            <input type="name" name="product_price" class="form-control" id="inputEmail" placeholder="Product Price" >

                        </div>
                        <div class="form-group">


                            <textarea name="product_description" class="form-control"  placeholder="Product Description" ></textarea>

                        </div>
                        <div class="form-group">


                            <input type="number" name="product_qty" class="form-control" id="inputEmail" placeholder="Product Quantity" >

                        </div>
                        <div class="form-group">


                            <input type="text" name="product_weight" class="form-control" id="inputEmail" placeholder="Product Weight" >

                        </div>

                        <div class="form-group">


                            <input type="file" name="product_img"  required>

                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Save</button>

                    </form>
                </div>
                <!--<p class="botto-text"> Designed by Code Tree</p>-->
            </div>
        </div>
 
</body>
</html>
