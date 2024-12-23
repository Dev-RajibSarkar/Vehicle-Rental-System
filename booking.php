<?php
include 'connect.php';
session_start();
$value = $_SESSION['c_email'];
$carid = $_GET['id'];
$sql = "select * from users where c_email='$value'";
$name = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($name);

$sql1 = "select * from vehicles where v_id = '$carid'";
$query = mysqli_query($conn, $sql1);
$result = mysqli_fetch_assoc($query);
$carprice = $result['price'];
$u_id = $rows['c_id'];

if (isset($_POST['submit'])) {
  $book_place = $_POST['book_place'];
  $bookingDate = $_POST['date'];
  $duration = $_POST['dur'];
  $destination = $_POST['des'];
  $return_dt  = $_POST['ret_date'];

  if ($bookingDate < $return_dt) {
    $price = ($duration * $carprice);
    $sql = "insert into booking (v_id, c_id, book_place, book_dt,duration, destination, fare, ret_dt) values($carid, $u_id,'$book_place','$bookingDate', $duration, '$destination', '$price','$return_dt')"; 
    $result = mysqli_query($conn, $sql);

    if ($result) {

        header("Location: payment.php");
        session_start();
        $_SESSION['c_email'] = $value;
    } else {
        echo '<script>alert("please check the connection")</script>';
    }
} else {
    echo  '<script>alert("please enter a correct return date")</script>';
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Vehicle Booking</title>
  <style>

* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body{
      font-family: Arial, sans-serif;
            background: url('images/booking.jpg') no-repeat center center fixed;
            background-size: cover;
    }
    .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            color: white;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ffcc00;
        }

        .navbar .menu {
            display: flex;
            list-style: none;
        }

        .navbar .menu li {
            margin-left: 20px;
        }

        .navbar .menu li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .navbar .menu li a:hover {
            background-color: #575757;
        }
        .form-label{
          color: white;
        }
  </style>

</head>

<body>

<div class="navbar">
    <div class="logo">CrAzY MoToRs</div>
    <ul class="menu">
        <li><a href="homepage.php">HOME</a></li>
        <li><a href="about_us.html">ABOUT US</a></li>
        <li><a href="contact_us.html">CONTACT US</a></li>
        <li><a href="booking_status.php">Booking Status</a></li>
        <li><a href="homepage.php">Logout</a></li>
    </ul>
</div>


  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Book Place</label>
        <input type="text" class="form-control" placeholder="Enter the booking place" name="book_place" required>
      </div>

      <div class="mb-3">
        <label class="form-label"> Booking Date:</label>
        <input type="date" class="form-control" name="date" id="datefield" min='1899-01-01' max='2000-13-13' placeholder="ENTER THE DATE FOR BOOKING" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Duration:</label>
        <input type="number" class="form-control" placeholder="Enter the duration(in days)" name="dur" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Destination</label>
        <input type="text" class="form-control" placeholder="Enter the destination" name="des" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Return Date:</label>
        <input type="date" class="form-control" name="ret_date" id="dfield" min='1899-01-01' placeholder="Enter The Return Date" required>
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Book Now</button>
    </form>
  </div>

  <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("datefield").setAttribute("min", today);
    </script>
    
    <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("dfield").setAttribute("min", today);
    </script>


</body>

</html>