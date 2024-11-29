<?php
include "thuvien.php";
include "function_bill_admin.php";
if (isset($_POST['id']) && isset($_POST['trangthai'])) {
    $bill = new bill();
    $id = $_POST['id'];
    $trangthai = $_POST['trangthai'];
    $allowedStatuses = ['Chưa Duyệt', 'Đã Duyệt', 'Đang Giao', 'Đã Giao'];
    if (!in_array($trangthai, $allowedStatuses)) {
        echo 'error';
        exit;
    }
    $ngaygiao = null;
    if ($trangthai === 'Đã Giao') {
        $ngaygiao = date('Y-m-d');
    }
    if ($trangthai === 'Đã Duyệt') {
        $bill->update_trangthai_and_stock($id, $trangthai, $ngaygiao);
    } else {
        if ($bill->update_trangthai($id, $trangthai, $ngaygiao)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
} else {
    echo 'error';
}
?>
