<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
include 'config.php';
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
    <script src="JS/main.js"></script>
    <div class="main">
        <?php
        include 'header.php';
        include 'search-cart.php';
        ?>
        <div class="content">
            <div class="grid wide">
                <?php $sql = "SELECT * FROM list_category 
                WHERE category_id=$id";
                $query = mysqli_query($conn, $sql);
                if (mysqli_num_rows($query) > 0);
                $row = mysqli_fetch_assoc($query) ;
                ?>
                <div class="">
                    <p class="cate-product-title">Danh mục <?php echo $row['category_name'] ?></p>
                </div>
                <div class="content-product">
                    <p class="content-title">Sản phẩm Tiêu biểu</p>
                    <div class="content-product-product">
                        <div class="row">
                            <?php

                            $sql = "SELECT * FROM list_book l, moth m,list_category c
                    WHERE l.thang_id=m.thang_id and c.category_id=l.category_id and l.category_id=$id";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo
                                    '<div class="col l-3">
                        <div class="content-product-box">
                            <a href="product-details.php?id=' . $row['book_id'] . '" class="content-product-book">
                                <div><img src="image/product-img/' . $row['book_img'] . '" alt="" class="product-book-img"></div>
                                <div class="product-book-content">
                                    <p class="product-book-name">' . $row['book_name'] . '</p>
                                    <div class="product-book-list">
                                        <div class="product-book-item">
                                            <p class="product-book-text">Khởi Điểm </p>
                                            <p class="product-book-text">' . $row['book_rice'] . 'đ</p>
                                        </div>
                                        <div class="product-book-item">
                                            <p class="product-book-text">Cao nhất </p>
                                            <p class="product-book-text">' . $row['rice_top'] . 'đ</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="product-book-rice" id="auction-status-' . $row['book_id'] . '">Đang đấu giá</p>
                                <p class="product-book-rice-close" id="auction-status-close' . $row['book_id'] . '">Hết thời gian</p>
                                <p style="display: none" id="demo-' . $row['book_id'] . '"></p>
                            </a>
                        </div>
                    </div>
                    <script>

  var countDownDate' . $row['book_id'] . ' = new Date("' . $row['thang_name'] . ' ' . $row['ngay'] . ', ' . $row['nam'] . ' ' . $row['gio'] . ':' . $row['phut'] . ':' . $row['giay'] . '").getTime();
 
  
  var x' . $row['book_id'] . ' = setInterval(function() {
 
   
    var now' . $row['book_id'] . ' = new Date().getTime();
 
    
    var distance' . $row['book_id'] . ' = countDownDate' . $row['book_id'] . ' - now' . $row['book_id'] . ';
 
    
    var days' . $row['book_id'] . ' = Math.floor(distance' . $row['book_id'] . ' / (1000 * 60 * 60 * 24));
    var hours' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60 * 60)) / (1000 * 60));
    var seconds' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60)) / 1000);
 
   
    document.getElementById("demo-' . $row['book_id'] . '").innerHTML = days' . $row['book_id'] . ' + "Ngày " + hours' . $row['book_id'] . ' + "Giờ "
    + minutes' . $row['book_id'] . ' + "Phút " + seconds' . $row['book_id'] . ' + "Giây ";
 
  
    if (distance' . $row['book_id'] . ' < 0) {
      clearInterval(x' . $row['book_id'] . ');
      document.getElementById("demo-' . $row['book_id'] . '").innerHTML = "Thời gian đếm ngược đã kết thúc";
      document.getElementById("auction-status-' . $row['book_id'] . '").style.display="none";
      document.getElementById("auction-status-close' . $row['book_id'] . '").style.display="block";
    }
  }, 1000);
</script>
                    ';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        include 'footer.php';
        include 'send-email-link.php';
        ?>
    </div>
</body>

</html>