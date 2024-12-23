<?php
include 'connect.php';
$book_id=$_GET['b_id'];
$sql="SELECT * from booking where book_id='$book_id'";
$result=mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($result);

if($res['status'] == 'under processing'){
    $sql="UPDATE booking set status='CANCELLED' where book_id = '$book_id'";
    $query=mysqli_query($conn,$sql);
    header('location: admin_bookingdisplay.php');
} 
?>