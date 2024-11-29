<?php 
include "ketnoi.php";
class bill extends ketnoi {
    public $id;
    public $name;
    public $address;
    public $tel;
    public $email;
    public $total;
    public $pttt;
    function hienthi() {
        $sql = "SELECT * FROM `bill`";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function hienthi_bill($id) {
        $sql = "SELECT * FROM `bill` WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function delete_bill($id) {
        $sql = "DELETE FROM `bill` WHERE id = '$id'";
        $result = mysqli_query($this->conn, $sql);

        if ($result) {
            $sql_delete_cart = "DELETE FROM `cart` WHERE idbill = '$id'";
            mysqli_query($this->conn, $sql_delete_cart);

            echo "<script>alert('Đã hủy đơn hàng và gửi thông báo đến khách hàng');</script>";
            echo "<script>window.history.back();</script>";
        } else {
            echo "<script>alert('Có lỗi xảy ra');</script>";
        }
    }
    function update_trangthai($id, $trangthai, $ngaygiao = null) {
        if ($trangthai === 'Đã Giao') {
            if ($ngaygiao === null) {
                $ngaygiao = date('Y-m-d');
            }
            $sql = "UPDATE `bill` SET trangthai = '$trangthai', ngaygiao = '$ngaygiao' WHERE id = $id";
        } else {
            $sql = "UPDATE `bill` SET trangthai = '$trangthai' WHERE id = $id";
        }
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    function update_trangthai_and_stock($id, $trangthai, $ngaygiao = null) {
        if ($trangthai === 'Đã Duyệt') {
            $sql_get_cart = "SELECT tensp, soluong FROM `cart` WHERE idbill = '$id'";
            $result_cart = mysqli_query($this->conn, $sql_get_cart);
            while ($row = mysqli_fetch_assoc($result_cart)) {
                $tensp = $row['tensp'];
                $soluong = $row['soluong']; 
                $sql_update_stock = "UPDATE `sanpham1` SET soluong = soluong - $soluong WHERE tensp = '$tensp'";
                mysqli_query($this->conn, $sql_update_stock);
            }
            $this->update_trangthai($id, $trangthai, $ngaygiao);
        }
    }
}
?>
