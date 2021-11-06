<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
?>

<?php
session_start(); //Dịch vụ bảo vệ


include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" class="">
    <link rel="stylesheet" href="css/base.css" class="">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="JS/main.js"></script>
    <div class="main">
        <?php
        include 'header.php';
        ?>
        <div class="content-add">
            <div class="grid wide">
                <p class="title-add">Gửi email phản hồi</p>
                <?php
                if (isset($_POST["send"])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $content = $_POST['content'];
                    $title = $_POST['title'];
                    if ($name != '' && $email != '' && $phone != '' && $content != '' && $title != '') {
                        $mail = new PHPMailer(true);
                        try {
                            echo'<div style="display:none;">';
                            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                            $mail->isSMTP();
                            $mail->Host = 'smtp.gmail.com';
                            $mail->SMTPAuth = true;
                            $mail->Username = '0972612200tuyen@gmail.com';
                            $mail->Password = 'tuyen0972612200';
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                            $mail->Port = 587;
                            $mail->CharSet = 'UTF-8';
                            $mail->setFrom('0972612200tuyen@gmail.com', $name);
                            $mail->addAddress('097261220tuyen@gmail.com', 'Admin');

                            $mail->isHTML(true);
                            $mail->Subject = $title;
                            $mail->Body = '<h3>Email : ' . $email . '</h3>
                                           <h3>SĐT : ' . $phone . '</h3>
                                           <h3>Nội dung : ' . $title . '</h3>';
                            $mail->send();
                            echo'</div>';
                            echo '<p class="title-ok">Email đã được gửi</p>';
                        } catch (Exception $e) {
                            echo '<p class="title-ok">Email chưa được gửi: ' . $mail->ErrorInfo . '</p>';
                        }
                    } else {
                        echo '<p class="title-ok">Bạn nhập thiếu thông tin</p>';
                    }
                }
                ?>
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col l-6">
                            <div class="box-product-add">
                                <label class="content-title-add">Tên</label>
                                <input type="text" class="input-add" name="name">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Email</label>
                                <input type="email" class="input-add" name="email">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Số điện thoại</label>
                                <input type="text" class="input-add" name="phone">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Tiêu đề</label>
                                <input type="text" class="input-add" name="title">
                            </div>
                            <div class="box-product-add">
                                <label class="content-title-add">Nội dung</label>
                                <textarea class="input-add" name="content" cols="33" rows="6"></textarea>
                            </div>
                            <div class="box-product-add">
                                <button class="btn-add" type="submit" name="send">Gửi email</button>
                            </div>

                </form>

            </div>
        </div>

    </div>
</body>

</html>