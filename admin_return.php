<?php
include 'connect.php';
$book_id=$_GET['b_id'];
$sql="SELECT * from booking where book_id='$book_id'";
$result=mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($result);

$v_id = $res['v_id']; 
$sql1="SELECT *from vehicles where v_id='$v_id'";
$result1=mysqli_query($conn,$sql1);
$res1= mysqli_fetch_assoc($result1);

if($res1['available']=='Y')
{
    echo '<script>alert("ALREADY CAR IS RETURNED")</script>';
    header('location: admin_bookingdisplay.php');
}
if($res['status'] == 'APPROVED'){
    $sql4="UPDATE vehicles set AVAILABLE='Y' where v_id= '$v_id'";
    $query2=mysqli_query($conn,$sql4);
    $sql5="UPDATE booking set status='RETURNED' where book_id = '$book_id'";
    $query=mysqli_query($conn,$sql5);
    echo '<script>alert("CAR RETURNED SUCCESSFULLY")</script>';
    header('location: admin_bookingdisplay.php');
} 

?>