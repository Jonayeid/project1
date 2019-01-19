<?php
session_start();
include('db_connect.php');
//if ($_SESSION['buyer_id'] == NULL) {
//   header("location:register.php");
//}
//echo $_SESSION['buyer_id'];
//echo $_SESSION['seller_id'];
$id = $_SESSION['user_id'];
include ('controller/BuyerMessage.php');
$ctlr = new BuyerMessage();
$result = $ctlr->select_buyer_info($id);
?>



<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="style.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet"/>
        <meta http-equiv="refresh" content="20" >

    </head>
    <body>
        <div class="container">
            <h3 class=" text-center">Seller Information</h3>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Buyer</h4>
                                   <a href="my-profile.php">
                                         <i class="fa fa-arrow-left"></i>  Beck </a>
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
                          if($result != NULL){
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id1 = $row['send_form'];
                                    $sql1 = "SELECT id,name FROM user where id='$id1'";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            ?>
                                            <a href="buyer-sent-message.php?buyer=<?php echo $row1['id']; ?>&seller=<?php echo $id; ?>">  <div class="chat_list">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5><?php echo $row1['name'] ?> <span class="chat_date"></span></h5>
                                                            <p>seen.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                }
                            } else {
                                echo "0 results";
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