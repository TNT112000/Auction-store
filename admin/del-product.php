<?php
include '../config.php';
if(isset($_GET['id'])){
   $id=$_GET['id'];
}
$sql="DELETE FROM list_book WHERE book_id=$id";
$query = mysqli_query($conn,$sql);
header("location: product-index.php");
?>