<?php

class BuyerMessage {

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

    public function select_buyer_info($id) {
        $sql = "SELECT DISTINCT send_form FROM messagebox where send_to='$id'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
//            
        }
    }

    public function select_buyer_message($bid, $sid) {
        $sqlM = "SELECT * FROM messagebox WHERE send_form='$bid' AND send_to='$sid'";
        $resultM = mysqli_query($this->conn, $sqlM);
        if (mysqli_num_rows($resultM) > 0) {
            return $resultM;
        }
    }

    public function save_buyer_message($ob, $bid, $sid) {
        $message = $ob['message'];
        $send_form = $bid;
        $send_to = $sid;
        $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        $time = $dt->format('F j, g:i a');
        $sql = "INSERT INTO messagebox (send_form, send_to, message, time, status) VALUES ('$send_form', '$send_to', '$message', '$time', '$send_to')";
        if ($this->conn->query($sql) === TRUE) {
            $ret = "1";
            return $ret;
        } else {
            $ret = "0";
            return $ret;
        }
    }

}
