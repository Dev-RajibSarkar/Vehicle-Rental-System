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
  <title>Admin Vehicles</title>
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
      <a href="vehicle_entry.php" class="text-light" style="text-decoration: none">Add Vehicle</a>
    </button>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">V_ID</th>
          <th scope="col">O_ID</th>
          <th scope="col">V_Name</th>
          <th scope="col">V_IMG</th>
          <th scope="col">Type</th>
          <th scope="col">Reg No</th>
          <th scope="col">Capacity</th>
          <th scope="col">Mileage</th>
          <th scope="col">Pur_dt</th>
          <th scope="col">Mfg</th>
          <th scope="col">Reg_exp</th>
          <th scope="col">Price</th>
          <th scope="col">Status</th>
          <th scope="col">Operations</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "select * from vehicles";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $v_id = $row['v_id'];
            $o_id = $row['o_id'];
            $v_name = $row['v_name'];
            $v_img = '<img src="images/' . $row['image'] . '" alt="" style="width:70px; height:auto;">';
            $type = $row['type'];
            $reg_no = $row['reg_no'];
            $capacity = $row['capacity'];
            $mileage = $row['milage'];
            $pur_dt = $row['pur_dt'];
            $mfg = $row['mfg'];
            $reg_exp = $row['reg_exp'];
            $status = $row['status'];
            $price = $row['price'];
            echo '<tr>
        <th scope="row">' . $v_id . '</th>
        <td>' . $o_id . '</td>
        <td>' . $v_name . '</td>
        <td>' . $v_img . '</td>
        <td>' . $type . '</td>
        <td>' . $reg_no . '</td>
        <td>' . $capacity . '</td>
        <td>' . $mileage . '</td>
        <td>' . $pur_dt . '</td>
        <td>' . $mfg . '</td>
        <td>' . $reg_exp . '</td>
        <td>' . $price . '</td>
        <td>' . $status . '</td>
        
        <td>
          <button class=" btn btn-primary my">
      <a href="admin_vehicleapprove.php?v_id=' . $v_id . '" class="text-light" style="text-decoration: none">Approve</a>
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