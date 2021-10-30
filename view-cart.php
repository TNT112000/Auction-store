<?php
session_start();
if (!isset($_SESSION['loginOK'])) {
    header("Location:index.php");
}

include 'config.php';

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];


$sql = "SELECT *	FROM list_book l, list_category c, moth m
                WHERE  l.category_id=c.category_id and l.thang_id=m.thang_id ";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="main">
        <?php
        include 'header.php';
        include 'search-cart.php';
        ?>
        <div class="content-details">
            <div class="wide grid">
                <div class="content-details-box">
                <p class="title-view-cart">Sản phẩm quan tâm</p>
                <?php foreach ($cart as $key => $row): ?>
                            <?php
                        echo '
                        <div class="row" style="margin:30px 0 100px 0 ; border:solid 1px ;padding: 20px 0 20px 0;">
                        <div class="col l-3">
                            <div class="content-details-img">
                                <img src="image/product-img/' . $row['book_img'] . '" class=details-img style="height:300px; ">
                            </div>
                        </div>
                        <div class="col l-4">
                            <div class="content-details-content">
                                <p class="content-item">Tác Giả : ' . $row['book_author'] . '</p>
                                <p class="content-item">Ngày xuất bản : ' . $row['book_date'] . '</p>
                                <p class="content-item">Ngày phát hành : ' . $row['book_publish'] . '</p>
                                <p class="content-item">Tên sách : ' . $row['book_name'] . '</p>
                                <p class="content-item">Thể loại : ' . $row['category_name'] . '</p>
                                <p class="content-item">Số trang : ' . $row['book_thickness'] . '</p>
                                <p class="content-item">Giá tiền : ' . $row['book_rice'] . 'đ</p>
                            </div>
                        </div>
                        <div class="col l-3">
                            <div class="content-auction" style="height:300px; border:1px solid green">
                                <p class="content-item">Giá khởi điểm</p>
                                <p class="content-red">' . $row['book_rice'] . 'đ</p>
                                <p class="content-item">Giá cao nhất</p>
                                <p class="content-red">' . $row['rice_top'] . 'đ</p>
                                <p class="content-item">Người trả giá cao nhất</p>
                                <p class="content-red content-red-stutus">' . $row['user_top'] . '</p>
                            </div>
                        </div>
                        <div class="col l-2">
                        <a href="product-details.php?id='. $row['book_id'] .'" class="link-cart-product">Chi tiết</a>
                        <a href="cart.php?id='. $row['book_id'] .'&action=delete" class="link-cart-product">Xóa bỏ</a>
                        </div>
                        </div>';?>
                      
                        <?php endforeach ?>
                    
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>
</html>