<?php
session_start();
if ($_SESSION['user_id'] == NULL) {
    header("location:index.php");
}
//echo $_SESSION['buyer_id'];
include ('controller/SelectSellerInfo.php');
$ctlr = new SelectSellerInfo();

$result = $ctlr->select_seller_information();
?>



<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="style.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"

    </head>
    <body>
        <div class="container">
            <h3 class=" text-center">Seller Information</h3>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Seller</h4>
                                <a href="logout-seller.php">
                                    <i class="fa fa-arrow-left"></i>  Logout </a>
                            </div>
                            <div class="srch_bar">
                                <div class="stylish-input-group">
                                    <input type="text" class="search-bar"  placeholder="Search" >
                                    <span class="input-group-addon">
                                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                    </span> </div>
                            </div>
                        </div>
                        <div class="inbox_chat">
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <a href="messaging.php?buyer=<?php echo $_SESSION['user_id']; ?>&seller=<?php echo $row['id']; ?>">  <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5><?php echo $row['name'] ?> <span class="chat_date"></span></h5>
                                                <p>Test, which is a new approach to have all solutions 
                                                    astrology under one roof.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                            ?>


                        </div>
                    </div>

                </div>


                <!--<p class="text-center top_spac"> Design by <a target="_blank" href="#">Code Tree</a></p>-->

            </div>
        </div>
    </body>
</html>