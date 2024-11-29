<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "btlwebt7";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
session_start();
function checkLoginAndPermission($requiredPermission)
{
    global $conn; 
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
    $tendangnhap = $_SESSION['user'];
    $sql = "SELECT quyen FROM taikhoan WHERE tendangnhap='$tendangnhap'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row['quyen'] < $requiredPermission) {
            header("Location: no_permission.php");
            exit();
        }
        return true;
    } else {
        die("Query error: " . mysqli_error($conn));
    }
}
?>