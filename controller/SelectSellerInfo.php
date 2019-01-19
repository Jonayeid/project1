<?php

class SelectSellerInfo {

    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $dbname = "db_codetree";

// Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
//echo "Connected successfully";
    }

    public function select_seller_information() {
        $type = "Seller";
        $sql = "SELECT * FROM user where type='$type'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        } else {
            echo "0 results";
        }
    }

}
