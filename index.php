<?php
session_start();

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
<?php
include 'slider.php';
include 'introduce.php';
include 'content.php';
include 'footer.php';
?>
<div class="send-email">
    <a href="send-email.php" class="link-send-email"><i class="send-email-icon fas fa-comment"></i></a>
</div>
<div class="send-email-2">
    
</div>
</div>

</body>

</html>