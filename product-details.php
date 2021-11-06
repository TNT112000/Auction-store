<?php
session_start()
?>

<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
<?php
$sql = "SELECT *	FROM list_book l, list_category c, moth m
WHERE  l.category_id=c.category_id and l.thang_id=m.thang_id and l.book_id=$id ";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
if (isset($_POST['btn-rice'])) {
    if (isset($_SESSION['loginOK'])) {
        $rice_top = $_POST['rice_top'];
        if ($rice_top != "") {
            if ($rice_top > $row['rice_top']) {
                $sql = "UPDATE list_book SET rice_top='$rice_top',user_top='$_SESSION[loginOK]' 
                                                WHERE book_id=$id ";
                $result = mysqli_query($conn, $sql);
                if ($result > 0) {
                    echo '<p class="title-rice">Đấu giá thành công<p>';
                    header("Location: product-details.php?id=$row[book_id]");
                } else {
                    echo '<p class="title-rice">Đấu giá thất bại<p>';
                    header("Location: product-details.php?id=$row[book_id]");
                }
            } else {
                echo '<p class="title-rice">Bạn phải nhập giá cao hơn<p>';
            }
        } else {
            echo '<p class="title-rice">Bạn chưa nhập giá<p>';
        }
    } else {
        header("Location: sign-in.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" class="">
    <link rel="stylesheet" href="css/grid.css" class="">
    <link rel="stylesheet" href="css/base.css" class="">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="JS/main.js"></script>
    <div class="main">
        <?php
        include 'header.php';
        include 'search-cart.php';
        ?>
        <div class="content-details">
            <div class="wide grid">
                <div class="content-details-box">
                    <div class="row">
                        <?php
                        $sql = "SELECT *FROM list_book l, list_category c, moth m
                    WHERE  l.category_id=c.category_id and l.thang_id=m.thang_id and l.book_id=$id ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        if (mysqli_num_rows($result) > 0) {
                            echo '<div class="col l-4">
                            <div class="content-details-img">
                                <img src="image/product-img/' . $row['book_img'] . '" class=details-img>
                            </div>
                        </div>
                        <div class="col l-5">
                            <div class="content-details-content">
                                <p class="content-item">Tác Giả : ' . $row['book_author'] . '</p>
                                <p class="content-item">Ngày xuất bản : ' . $row['book_date'] . '</p>
                                <p class="content-item">Ngày phát hành : ' . $row['book_publish'] . '</p>
                                <p class="content-item">Tên sách : ' . $row['book_name'] . '</p>
                                <p class="content-item">Thể loại : ' . $row['category_name'] . '</p>
                                <p class="content-item">Số trang : ' . $row['book_thickness'] . '</p>
                                <p class="content-item">Giá tiền : ' . $row['book_rice'] . 'đ</p>
                                <p class="content-item">Tóm tắt nội dung</p>
                                <p class="product-details-title">' . $row['book_title'] . '</p>
                            </div>
                        </div>
                        <div class="col l-3">
                            <div class="content-auction">
                                   <p class="content-red-title">Đấu giá</p>
                                <p class="content-item">Giá khởi điểm</p>
                                <p class="content-red">' . $row['book_rice'] . 'đ</p>
                                <p class="content-item">Giá cao nhất</p>
                                <p class="content-red">' . $row['rice_top'] . 'đ</p>
                                <p class="content-item">Người trả giá cao nhất</p>
                                <p class="content-red content-red-stutus">' . $row['user_top'] . '</p>
                                '; ?>

                        <?php
                        if (isset($_POST['btn-rice'])) {
                            
                                $rice_top = $_POST['rice_top'];
                                if ($rice_top != "") {
                                    if ($rice_top > $row['rice_top']) {
                                        $sql = "UPDATE list_book SET rice_top='$rice_top',user_top='$_SESSION[loginOK]' 
                                                                        WHERE book_id=$id ";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result > 0) {
                                           
                                            echo '<p class="title-rice">Đấu giá thành công<p>';
                                        } else {
                                           
                                            echo '<p class="title-rice">Đấu giá thất bại<p>';
                                        }
                                    } else {
                                        echo '<p class="title-rice">Bạn phải nhập giá cao hơn<p>';
                                    }
                                } else {
                                    echo '<p class="title-rice">Bạn chưa nhập giá<p>';
                                }
                            
                        }
                         echo '<form action="" class ="form-rice"  method="post" enctype="multipart/form-data">
                                <input id="input-rice' . $row['book_id'] . '" type="text" class="input-rice" name="rice_top" placeholder="Nhập số tiền đấu giá">
                                <button id="btn-rice' . $row['book_id'] . '" class="btn-content-auction" name="btn-rice" onclick="goBack()"> Trả giá </button>
                                <p id="rice-open' . $row['book_id'] . '" class="content-red-title"> Đã chốt giá </p>
                                </form> 
                            </div>
                        </div>
                        <div class="col l-4">
                        <div class="cart-auction-box">';
                            if (isset($_SESSION['loginOK'])) {
                                echo '<a href="cart.php?id=' . $row['book_id'] . '" class="cart-auction-link">Quan tâm</a>';
                            } else {
                                echo '<a href="sign-in.php" class="cart-auction-link">Quan tâm</a>';
                            }
                            echo '</div>
                        </div>
                        <div class="col l-5">
                        <p class="time-auction" id="demo-' . $row['book_id'] . '"></p>
                        </div>
                        <script>
                        document.getElementById("rice-open' . $row['book_id'] . '").style.display="none";
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
                            document.getElementById("demo-' . $row['book_id'] . '").innerHTML = "Thời gian đấu giá đã kết thúc";
                            document.getElementById("btn-rice' . $row['book_id'] . '").style.display="none";
                            document.getElementById("rice-open' . $row['book_id'] . '").style.display="block";
                            document.getElementById("input-rice' . $row['book_id'] . '").style.display="none";
                          }
                        }, 1000);
                      </script> ';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.go(0);
        }
    </script>
    <?php
    include 'footer.php';
    include 'send-email-link.php';
    ?>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>