<?php
include 'connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Admin Booking Display</title>
  <style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

    .form{
      margin-top: 40px;
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px 40px;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }

    .icon .logo {
      font-size: 24px;
      font-weight: bold;
      color: #ffcc00;
    }

    .menu ul {
      display: flex;
      list-style: none;
    }

    .menu ul li {
      margin-left: 20px;
    }

    .menu ul li a {
      color: black;
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
    }
  </style>
</head>

<body>

<div class="navbar">
    <div class="icon">
      <h2 class="logo">CrAzy MoToRs</h2>
    </div>
    <div class="menu">
      <ul>
        <li><a href="admin_dash.php">Home</a></li>
        <li><a href="admin_vehicledisplay.php">Vehicle Management</a></li>
        <li><a href="admin_userdisplay.php">User Management</a></li>
        <li><a href="admin_ownerdisplay.php">Owner Management</a></li>
        <li><a href="admin_bookingdisplay.php">Bookings</a></li>
        <li><a href="homepage.php">Logout</a></li>
      </ul>
    </div>
  </div>

  <div class="container form">
    <button class=" btn btn-primary my-5">
      <a href="car_details.php" class="text-light" style="text-decoration: none">New Booking</a>
    </button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Book_ID</th>
          <th scope="col">V_id </th>
          <th scope="col">C_id </th>
          <th scope="col">Book_place</th>
          <th scope="col">Book_date</th>
          <th scope="col">Duration</th>
          <th scope="col">Destination</th>
          <th scope="col">Fare</th>
          <th scope="col">Return_date</th>
          <th scope="col">Status</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $sql = "select * from booking";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $book_id = $row['book_id'];
            $v_id = $row['v_id'];
            $c_id = $row['c_id'];
            $book_place = $row['book_place'];
            $book_dt = $row['book_dt'];
            $duration = $row['duration'];
            $destination = $row['destination'];
            $fare = $row['fare'];
            $ret_dt = $row['ret_dt'];
            $status = $row['status'];

            echo '<tr>
        <th scope="row">' . $book_id . '</th>
        <td>' . $v_id . '</td>
        <td>' . $c_id . '</td>
        <td>' . $book_place . '</td>
        <td>' . $book_dt . '</td>
        <td>' . $duration . '</td>
        <td>' . $destination . '</td>
        <td>' . $fare . '</td>
        <td>' . $ret_dt . '</td>
        <td>' . $status . '</td>
        
        <td>
          <button class=" btn btn-primary">
      <a href="admin_bookingapprove.php?b_id=' . $book_id . '" class="text-light" style="text-decoration: none">Approve</a>
    </button>
          <button class=" btn btn-primary">
      <a href="admin_return.php?b_id='. $book_id.'>" class="text-light" style="text-decoration: none">Returned</a>
    </button>
          <button class=" btn btn-primary">
      <a href="admin_cancel.php?b_id='. $book_id.'>" class="text-light" style="text-decoration: none">Cancel</a>
    </button>
        </td>
      </tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>