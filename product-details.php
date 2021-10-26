<?php
session_start()
?>

<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
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
                        $sql = "SELECT l.rice_top,l.ngay,l.gio,l.nam,l.phut,l.giay,l.thang_id,l.book_id,l.book_img,l.book_name,l.category_id,l.book_thickness,l.book_rice,l.book_author,l.book_date,l.book_publish,l.book_title,c.category_name,c.category_id,m.thang_name,m.thang_id	FROM list_book l, list_category c, moth m
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
                                <p class="content-red">t</p>';
                            if (isset($_POST["btn-rice"])) {
                                $rice_top = $_POST['rice_top'];

                                if ($rice_top == '') {
                                    echo '<p>Bạn chưa nhập giá</p>';
                                }
                                else{
                                    echo '<form action="" class="form-rice">
                                <input id="input-rice" type="text" class="input-rice" name="rice_top" placeholder="Nhập số tiền đấu giá">
                                <button id="btn-rice" class="btn-content-auction" name="btn-rice" >Trả giá</button>
                                <p id="rice-open" class="content-red-title">Đã chốt giá</p>
                                </form>';
                                }
                            }
                            echo '</div>
                        </div>
                        <div class="col l-5">
                        <p class="time-auction" id="demo-' . $row['book_id'] . '"></p>
                        </div>
                        <script>
  
  var countDownDate = new Date("' . $row['thang_name'] . ' ' . $row['ngay'] . ', ' . $row['nam'] . ' ' . $row['gio'] . ':' . $row['phut'] . ':' . $row['giay'] . '").getTime();
 
  
  var x = setInterval(function() {
 
   
    var now = new Date().getTime();
 
    
    var distance = countDownDate - now;
 
    
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
 
   
    document.getElementById("demo-' . $row['book_id'] . '").innerHTML = "Thời gian : "+days + ":"+ hours + ":"+ minutes + ":"+ seconds + "";
 
  
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo-' . $row['book_id'] . '").innerHTML = "Thời gian đấu giá đã kết thúc";
      document.getElementById("input-rice").style.display = "none";
      document.getElementById("rice-open").style.display = "block";
      document.getElementById("btn-rice").style.display = "none";
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
</body>

</html>