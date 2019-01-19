<?php

class MessageController {

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

    public function select_seller_message($bid, $sid) {
//        echo $bid;
//        echo $sid;
//        exit();
        
        $sqlM = "SELECT * FROM messagebox WHERE send_form='$bid' AND send_to='$sid'";
        $resultM = mysqli_query($this->conn, $sqlM);
        if (mysqli_num_rows($resultM) > 0) {
            return $resultM;
        } else {
//            echo "0 results";
            
        }
    }

    public function save_buyer_message($ob,$bid,$sid) {
        $message = $ob['message'];
        $send_form = $bid;
        $send_to = $sid;
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $time = $dt->format('F j, g:i a');
        $sql = "INSERT INTO messagebox (send_form, send_to, message, time, status) VALUES ('$send_form', '$send_to', '$message', '$time', '$send_form')";
        if ($this->conn->query($sql) === TRUE) {      
            $ret = "1";  
            return $ret;
        } else {         
            $ret = "0";
            return $ret;
        }
    }

}
