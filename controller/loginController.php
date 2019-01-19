<?php
session_start();
class loginController {

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

    public function logincheck($ob) {
        $email = $ob["email"];
        $password = MD5($ob["password"]);
        $sql = "SELECT * FROM user where email='$email' and password='$password'";
        $result = $this->conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
                $type = $row["type"];
                $name = $row["name"];
                $status = $row["status"];
            }
            if ($status == '1') {
//                echo $type;
//                exit();
                $_SESSION['user_id'] = $id;
                $_SESSION['user_type'] = $type;
                $_SESSION['user_name'] = $name;
                header("location:index.php");
            } else {
                $error = "Your Account has not approved !! Please Contact with  Author?";
            }
        } else {
            $error = "Password Has Not Matched !! Please try Again ? ";
        }
    }

}
