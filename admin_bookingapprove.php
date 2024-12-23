<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Admin Booking Approve</title>
</head>

<body>
  <?php
include 'connect.php';
$id = $_GET['b_id'];
$sql = "SELECT * from booking where book_id = '$id'";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);

$carId = $res['v_id'];
$sql1 = "SELECT * from vehicles where v_id = '$carId'";
$carres=mysqli_query($conn,$sql1);
$carresult = mysqli_fetch_assoc($carres);

if($res['status'] == 'under processing'){
  $sql3="UPDATE booking set status='APPROVED' where book_id = '$id'";
  $query=mysqli_query($conn,$sql3);
  $sql4="UPDATE vehicles set available ='N' where v_id='$carId'";
  $query2 = mysqli_query($conn, $sql4);
  echo '<script>alert("APPROVED SUCCESSFULLY")</script>';
  header("Location: admin_bookingdisplay.php");
    }

else{
  if($carresult['available']=='Y')
{
if ($res['status'] == 'APPROVED' || $res['status']=='RETURNED') {
  echo '<script>alert("ALREADY APPROVED")</script>';
  header("Location: admin_bookingdisplay.php");
  } 
}

}
?>
</body>

</html>