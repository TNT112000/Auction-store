<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location:../index.php");
}
include '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css" class="">
    <link rel="stylesheet" href="../css/grid.css" class="">
    <link rel="stylesheet" href="../css/base.css" class="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body >
<script src="../JS/main.js"></script>
<div class="main">
<?php
include 'header.php';
?>
    <style>
        .content{
            margin-top: 55px;
            height: 100vh;
        }
        .title{
            font-size: 40px;
            color:var(--main--color);
        }
        .manage-item{
            background-color: var(--secondary--color);
            padding: 0 0 30px 0;
        }
        .manage-title{
            color:var(--main--color);
            font-size: 28px;
            font-weight: 600;
            text-align: center;
            margin-top: 80px;
            padding: 30px 0 40px 0;
        }
        .manage-link{
            margin: auto;
            display: block;
            text-align: center;
            text-decoration: none;
            width: 180px;
            height: 35px;
            background-color: var(--main--color);
            color:var(--secondary--color);
            line-height: 35px;
            border-radius:  6px;
        }
    </style>
    <div class="content">
    <div class="wide grid">
        <p class="title">Chào mừng bạn đến với trang quản trị</p>
        <div class="manage">
            <div class="row">
                <div class="col l-3">
                    <div class="manage-item">
                        <p class="manage-title">Quản lý tài khoản</p>
                        <a href="" class="manage-link">Ấn vào đây</a>
                    </div>
                </div>
                <div class="col l-3">
                    <div class="manage-item">
                        <p class="manage-title">Quản lý danh mục</p>
                        <a href="cate-index.php" class="manage-link">Ấn vào đây</a>
                    </div>
                </div>
                <div class="col l-3">
                    <div class="manage-item">
                        <p class="manage-title">Quản lý sản phẩm</p>
                        <a href="product-index.php" class="manage-link">Ấn vào đây</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>