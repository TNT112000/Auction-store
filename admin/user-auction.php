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
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" class="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<script src="../JS/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 
<script>
    $(document).ready(function () {
        $('#table2').DataTable();
    });
</script>
    <div class="main">
        <?php
         include 'header.php';
        ?>
        <div class="add-category-bg">
            <div class="wide grid">
                <a href="add-product.php" class="add-category">Người Đấu giá</a>
            </div>
        </div>
        <div class="content"> 
        <div class="grid wide">
                <div class="content-product">
                    <table class="table-users" id="table2" style="margin:0 0 20px 0;">
                        <thead>
                            <th class="user-auction-name">Người Đấu Giá</th>
                            <th class="user-auction-phone">SĐT</th>
                            <th class="user-auction-email">Email</th>
                            <th class="user-auction-product">Tên sản phẩm</th>
                            <th class="user-auction-rice">Khởi điểm</th>
                            <th class="user-auction-rice_top">Cao nhất</th>
                            <th class="user-auction-time">Thời gian</th>
                        </thead>
                        <tbody>
                            <?php
                        $sql = "SELECT * FROM users u,list_book l,moth m WHERE u.user_name=l.user_top and m.thang_id=l.thang_id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if($row['user_name']=$row['user_top']){
                            echo'<tr>
                                <td class="user-auction-name">'.$row['user_name'].'</td>
                                <td class="user-auction-phone">'.$row['user_phone'].'</td>
                                <td class="user-auction-email">'.$row['user_email'].'</td>
                                <td class="user-auction-product">'.$row['book_name'].'</td>
                                <td class="user-auction-rice">'.$row['book_rice'].'</td>
                                <td class="user-auction-rice_top">'.$row['rice_top'].'</td>
                                <td id="demo-' . $row['book_id'] . '" class="user-auction-time" style="color:red"></td>
                            </tr>
                            <script>

  var countDownDate' . $row['book_id'] . ' = new Date("'.$row['thang_name'].' '.$row['ngay'].', '.$row['nam'].' '.$row['gio'].':'.$row['phut'].':'.$row['giay'].'").getTime();
 
  
  var x' . $row['book_id'] . ' = setInterval(function() {
 
   
    var now' . $row['book_id'] . ' = new Date().getTime();
 
    
    var distance' . $row['book_id'] . ' = countDownDate' . $row['book_id'] . ' - now' . $row['book_id'] . ';
 
    
    var days' . $row['book_id'] . ' = Math.floor(distance' . $row['book_id'] . ' / (1000 * 60 * 60 * 24));
    var hours' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60 * 60)) / (1000 * 60));
    var seconds' . $row['book_id'] . ' = Math.floor((distance' . $row['book_id'] . ' % (1000 * 60)) / 1000);
 
   
    document.getElementById("demo-' . $row['book_id'] . '").innerHTML = days' . $row['book_id'] . ' + ":" + hours' . $row['book_id'] . ' + ":"
    + minutes' . $row['book_id'] . ' + ":" + seconds' . $row['book_id'] . ' + "";
 
  
    if (distance' . $row['book_id'] . ' < 0) {
      clearInterval(x' . $row['book_id'] . ');
      document.getElementById("demo-' . $row['book_id'] . '").innerHTML = "Kết thúc";
      document.getElementById("auction-status-' . $row['book_id'] . '").style.display="none";
      document.getElementById("auction-status-close' . $row['book_id'] . '").style.display="block";
    }
  }, 1000);
</script>';
                            }
}
}
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</script>
</body>
</html>