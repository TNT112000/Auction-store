<?php
session_start(); //Dịch vụ bảo vệ
if (!isset($_SESSION['loginOK'])) {
    header("Location:index.php");
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
    <link rel="stylesheet" href="css/style.css" class="">
    <link rel="stylesheet" href="css/base.css" class="">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" class="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <script src="JS/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table4').DataTable();
        });
    </script>
    <div class="main">
        <?php
        include 'header.php';
        ?>


        <div class="add-category-bg">
            <div class="wide grid">
                <a href="admin/add-product.php" class="add-category">Thêm Sản Phẩm</a>
            </div>
        </div>
        <div class="content">
            <div class="grid wide">
                <div class="content-product">
                    <p class="content-title">Sản phẩm</p>
                    <div class="content-product-product">
                        <div class="row">

                            <div class="col l-12 ">
                                <div class="content-product-box" style="overflow-x:auto;">
                                    <table class="table-product table-users" id="table4" style="margin:0 0 20px 0;">
                                        <thead class="">
                                            <th class="text-align">Tên sản phẩm</th>
                                            <th class="text-align">Khởi điểm</th>
                                            <th class="text-align">Cao nhất</th>
                                            <th class="text-align">Thời gian</th>
                                            <th class="text-align">Sửa</th>
                                            <th class="text-align">Xóa</th>
                                            <th class="text-align">Chi tiết</th>
                                        </thead>
                                        <tbody class="">
                                            <?php
                                            $sql = "SELECT l.book_own,l.user_top,l.rice_top,l.ngay,l.gio,l.nam,l.phut,l.giay,l.thang_id,l.book_id,l.book_img,l.book_name,l.category_id,l.book_thickness,l.book_rice,l.book_author,l.book_date,l.book_publish,l.book_title,c.category_name,c.category_id,m.thang_name,m.thang_id	FROM list_book l, list_category c, moth m
                                            WHERE  l.category_id=c.category_id and l.thang_id=m.thang_id  ";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    if ($row['book_own'] == $_SESSION['loginOK']) {
                                                        echo '
                                                <tr class="">
                                                    <td class="text-align">' . $row['book_name'] . '</td>
                                                    <td class="text-align">' . $row['book_rice'] . '</td>
                                                    <td class="text-align">' . $row['rice_top'] . '</td>
                                                    <td id="demo-' . $row['book_id'] . '" class="user-auction-time" style="color:red"></td>
                                                    <td class="text-align"><a href="user-sell-up.php?id=' . $row['book_id'] . '"><i class="edit-delate-category-icon fas fa-edit"></i></a></td>
                                                    <td class="text-align"><a href="admin/del-product.php?id=' . $row['book_id'] . '"><i class="edit-delate-category-icon fas fa-times"></i></a></td>
                                                    <td class="text-align"><a href="user-sell-details.php?id=' . $row['book_id'] . '"><i class="edit-delate-category-icon fas fa-calendar-week"></i></td>
                                                </tr>
                                                <script>

  var countDownDate' . $row['book_id'] . ' = new Date("' . $row['thang_name'] . ' ' . $row['ngay'] . ', ' . $row['nam'] . ' ' . $row['gio'] . ':' . $row['phut'] . ':' . $row['giay'] . '").getTime();
 
  
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
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
</body>

</html>