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
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" class="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<script src="../JS/main.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 
<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>

    <div class="main">
        <?php
         include 'header.php';
        ?>
        <div class="add-category-bg">
            <div class="wide grid">
                <a href="add-product.php" class="add-category">Danh sách tài khoản</a>
            </div>
        </div>
        <div class="content">
            <div class="grid wide">
                <div class="content-product">
                    <table class="table-users" id="table1" style="margin:0 0 20px 0;">
                        <thead>
                            <th class="item-id">#</th>
                            <th class="item-date">Ngày đăng ký</th>
                            <th class="item-name">Tên </th>
                            <th class="item-email">Eamil</th>
                            <th class="item-phone">SĐT</th>
                            <th class="item-pass">Mật khẩu</th>
                        </thead>
                        <tbody>
                            <?php
                        $sql = "SELECT * FROM users";
                                    
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo'<tr>
                                <td class="item-id">'.$row['user_id'].'</td>
                                <td class="item-date">'.$row['user_date'].'</td>
                                <td class="item-name">'.$row['user_name'].'</td>
                                <td class="item-email">'.$row['user_email'].'</td>
                                <td class="item-phone">'.$row['user_phone'].'</td>
                                <td ><div class="item-pass-item">'.$row['user_password'].'</div></td>
                            </tr>';
                        }}
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>