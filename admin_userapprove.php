<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>user Approve</title>
</head>

<body>
  <?php
include 'connect.php';
$id = $_GET['c_id'];
$sql = "SELECT * from users where c_id = $id";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
if ($res['status'] == 'under processing') {
  $query = "UPDATE users set status ='APPROVED' where c_id = $id";
  $queryy = mysqli_query($conn, $query);
  echo '<script>alert("APPROVED SUCCESSFULLY")</script>';
  header("Location: admin_userdisplay.php");
} else {
  echo '<script>alert("ALREADY APPROVED")</script>';
  header("Location: admin_userdisplay.php");
}
?>
</body>

</html>