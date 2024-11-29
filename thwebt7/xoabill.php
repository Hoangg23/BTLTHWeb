<?php 
include "headerquantri.php";
include "function_bill_admin.php";
include "config_email.php";

if(isset($_GET['id'])) {
    $bill = new bill();
    $id = $_GET['id'];
    
    // Lấy thông tin đơn hàng
    $result = $bill->hienthi_bill($id);
    $order = mysqli_fetch_array($result);
    
    // Kiểm tra nếu đơn hàng tồn tại
    if($order) {
        $to = $order['email'];
        $subject = "Thông báo đơn hàng #" . $id . " đã bị hủy";
        
        $message = "
        <html>
        <head>
            <title>Thông báo hủy đơn hàng</title>
        </head>
        <body style='font-family: Arial, sans-serif;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px;'>
                <h2 style='color: #d9534f;'>Thông báo hủy đơn hàng #$id</h2>
                <p>Xin chào <strong>" . $order['name'] . "</strong>,</p>
                <p>Chúng tôi rất tiếc phải thông báo rằng đơn hàng #$id của bạn đã bị hủy.</p>
                <p><strong>Lý do:</strong> Sản phẩm trong đơn hàng của bạn hiện đã hết hàng.</p>
                <p>Chúng tôi chân thành xin lỗi vì sự bất tiện này và hy vọng được phục vụ bạn trong những đơn hàng tiếp theo.</p>
                <hr style='border: 1px solid #eee; margin: 20px 0;'>
                <p>Nếu bạn có bất kỳ thắc mắc nào, vui lòng liên hệ với chúng tôi qua:</p>
                <ul>
                    <li>Email: support@mensstyle.com</li>
                    <li>Hotline: 1900 xxxx</li>
                </ul>
                <p>Trân trọng,<br><strong>Quản lý Shop</strong></p>
            </div>
        </body>
        </html>
        ";
        
        // Gửi email sử dụng PHPMailer
        if(sendEmail($to, $subject, $message)) {
            // Nếu gửi email thành công thì xóa đơn hàng
            $bill->delete_bill($id);
        } else {
            echo "<script>alert('Có lỗi khi gửi email thông báo!')</script>";
            echo "<script>window.history.back()</script>";
        }
    } else {
        echo "<script>alert('Không tìm thấy đơn hàng!')</script>";
        echo "<script>window.history.back()</script>";
    }
} else {
    echo "<script>window.history.back()</script>";
}
?>