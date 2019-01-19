<?php
session_start();
include('db_connect.php');
if ($_SESSION['user_id'] == NULL) {
    header("location:register.php");
}
//echo $_SESSION['buyer_id'];

$buyer = $_GET['buyer'];
$seller = $_GET['seller'];
$error = NULL;
$msg = NULL;

include ('controller/BuyerMessage.php');
$ctlr = new BuyerMessage();
$res = NULL;
if (isset($_POST['submit'])) {
     $res = $ctlr->save_buyer_message($_POST, $buyer, $seller);  
}
$result = $ctlr->select_buyer_message($buyer,$seller);
?>
<html>
    <head>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href="style.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet" />
       <meta http-equiv="refresh" content="20" >
        <script type="text/javascript">
            window.addEventListener('load', function () {
                var element = document.getElementById("msg_history");
                element.scrollTop = element.scrollHeight - element.clientHeight;
            }, true);
           
        </script>
    </head>
    <body>
        <div class="container">
            <h3 class=" text-center">Messaging</h3>
            <span style="color:red;"><?php
                if ($res == '0') {

                    echo "Warning ! Message Not Sent";
                    $error = NULL;
                }
                ?> </span> 
            <span style="color:green;"><?php
                if ($res == '1') {
                    $msg = "Sent Message Successfull !!";
                    echo $msg;
                    $msg = NULL;
                }
                ?> </span>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>
                                <?php
                                $sql = "SELECT name FROM user where id='$buyer'";
                                $result1 = $conn->query($sql);

                                if ($result1->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result1->fetch_assoc()) {
                                        echo $row["name"];
                                    }
                                } else {
                                    echo "0 results";
                                }
                                ?>
                            </h4>
                            <a href="buyer-message.php">
                                         <i class="fa fa-arrow-left"></i>  Beck </a>
                        </div>
                        <div class="srch_bar">
                            <div class="stylish-input-group">
                                <div class="recent_heading" style="align-content: right;width: 100%;">
                                    <h4>Me</h4>
                                    <a href="buyer-sent-message.php?buyer=<?php echo $buyer;?>&seller=<?php echo $seller;?>">
                                         <i class="fa fa-refresh" aria-hidden="true"></i>  Refresh Here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mesgs">
                        <div class="msg_history" id="msg_history">
                            <?php
                            if($result != NULL){
                                while ($rowM = mysqli_fetch_assoc($result)) {
                                    if ($rowM['status'] == $seller) {
                                        ?>
                                        <div class="outgoing_msg">
                                            <div class="sent_msg">
                                                <p><?php echo $rowM['message']; ?></p>
                                                <span class="time_date"> <?php echo $rowM['time']; ?></span> </div>
                                        </div>
                                    <?php } else {
                                        ?>
                                        <div class="incoming_msg">
                                            <div class="incoming_msg_img"> <img src="img/human.jpg" alt="sunil"> </div>
                                            <div class="received_msg">
                                                <div class="received_withd_msg">
                                                    <p><?php echo $rowM['message']; ?></p>
                                                    <span class="time_date"> <?php echo $rowM['time']; ?></span> </div>
                                            </div>
                                        </div>



                                        <?php
                                    }
                                }
                            } else {
                                echo "0 results";
                            }
                            ?>



                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <form action="" method="post">
                                    <input type="text" name="message" class="write_msg" placeholder="Type a message" />
                                    <button class="msg_send_btn" type="submit" name="submit" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>


                <p class="text-center top_spac"> Design by <a target="_blank" href="#">Code Tree</a></p>

            </div></div>
    </body>
</html>