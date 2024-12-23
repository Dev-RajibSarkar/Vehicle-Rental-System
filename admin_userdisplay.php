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
  <title>Admin User </title>
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
        <li><a href="homepage.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>
  <div class="container form">
    <button class=" btn btn-primary my-5">
      <a href="customer_registration.php" class="text-light" style="text-decoration: none">Add User</a>
    </button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">C_ID</th>
          <th scope="col">C_Name</th>
          <th scope="col">C_Email</th>
          <th scope="col">Password</th>
          <th scope="col">Address</th>
          <th scope="col">Ph_no</th>
          <th scope="col">Adhaar_No</th>
          <th scope="col">Driving_License_No</th>
          <th scope="col">Dl_Validity</th>
          <th scope="col">Gender</th>
          <th scope="col">Status</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "select * from users";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['c_id'];
            $name = $row['c_name'];
            $email = $row['c_email'];
            $pass = $row['password'];
            $address = $row['address'];
            $ph_no = $row['ph_no'];
            $adhar_no = $row['adhar_no'];
            $dl_no = $row['dl_no'];
            $dl_validity = $row['dl_validity'];
            $gender = $row['gender'];
            $status = $row['status'];
            echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $name . '</td>
        <td>' . $email . '</td>
        <td>' . $pass . '</td>
        <td>' . $address . '</td>
        <td>' . $ph_no . '</td>
        <td>' . $adhar_no . '</td>
        <td>' . $dl_no . '</td>
        <td>' . $dl_validity . '</td>
        <td>' . $gender . '</td>
        <td>' . $status . '</td>
        <td>
          <button class=" btn btn-primary">
      <a href="admin_userapprove.php?c_id=' . $id . '" class="text-light" style="text-decoration: none">Approve</a>
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