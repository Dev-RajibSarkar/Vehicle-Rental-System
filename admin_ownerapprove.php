<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Admin Owner Approve </title>
</head>

<body>
  <?php
include 'connect.php';
$id = $_GET['o_id'];
$sql = "SELECT * from owner where o_id = $id";
$result = mysqli_query($conn, $sql);
$res = mysqli_fetch_assoc($result);
if ($res['status'] == 'under processing') {
  $query = "UPDATE owner set status ='APPROVED' where o_id = $id";
  $queryy = mysqli_query($conn, $query);
  echo '<script>alert("APPROVED SUCCESSFULLY")</script>';
  header("Location: admin_ownerdisplay.php");
} else {
  echo '<script>alert("ALREADY APPROVED")</script>';
  header("Location: admin_ownerdisplay.php");
}
?>
</body>

</html>