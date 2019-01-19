<?php
session_start();
include('../../db_connect.php');
$id = $_SESSION['admin_id'];
$sql1 = "UPDATE admin SET login='0' WHERE id=$id";
if ($conn->query($sql1) === TRUE) {
    $_SESSION['admin_id'] = NULL;
    $_SESSION['admin_name'] = NULL;
    $_SESSION['admin_type'] = NULL;
    header("location:../admin-login-panel.php");
} else {
    $error = "Error updating record: " . $conn->error;
    header("location:index.php");
}