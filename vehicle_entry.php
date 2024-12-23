<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $file_name = $_FILES['image']['name'];
  $tempname = $_FILES['image']['tmp_name'];
  $folder = 'images/'.$file_name;
  $vname = $_POST['vname'];
  $type = $_POST['type'];
  $reg_no = $_POST['reg_no'];
  $capacity = $_POST['capacity'];
  $mileage = $_POST['mileage'];
  $price = $_POST['price'];
  $pur_dt = $_POST['pur_dt'];
  $mfg_dt = $_POST['mfg_dt'];
  $reg_exp = $_POST['reg_exp'];


  //check if the owner is registered
  $sql = "select o_id from owner where email = '$email'";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($query);
  $id = $result['o_id'];
  if ($result) {
    $sql1 = "insert into vehicles (o_id, v_name, image, type, reg_no, capacity, milage, price, pur_dt, mfg, reg_exp) values ('$id', '$vname', '$file_name','$type', '$reg_no', '$capacity', '$mileage', '$price', '$pur_dt', '$mfg_dt', '$reg_exp')";
    $query1 = mysqli_query($conn, $sql1);
    echo '<script>alert("Vehicle data is inserted")</script>';
  }
  else{
    echo '<script>alert("Owner must register first")</script>';
    echo die(mysqli_error($conn));
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>vehicle Entry</title>
  <style>

* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 40px;
      /* background-color: rgba(0, 0, 0, 0.8); Semi-transparent background */
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
      color: white;
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
    }
    body {
      background: url('images/carbg.png') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      color: white;
      }
      .btnn{
      margin-bottom: 20px;
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
        <li><a href="homepage.php">HOME</a></li>
        <li><a href="about_us.html">ABOUT US</a></li>
        <li><a href="contact_us.html">CONTACT US</a></li>
        <li><a href="homepage.php">LOGOUT</a></li>
      </ul>
    </div>
  </div>

  <div class="container my-5">
    <form method="post" enctype="multipart/form-data">

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control"  name="image" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Vehicle Name</label>
        <input type="text" class="form-control" placeholder="Enter the vehicle name" name="vname" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Type</label>
        <input type="text" class="form-control" placeholder="Enter the fuel type" name="type" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Registration No</label>
        <input type="text" class="form-control" placeholder="Enter vehicle registration no" name="reg_no" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Capacity</label>
        <input type="number" class="form-control" placeholder="Enter the seating capacity" name="capacity" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Mileage</label>
        <input type="text" class="form-control" placeholder="Enter the vehicle mileage" name="mileage" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" class="form-control" placeholder="Enter the vehicle price (for one day)" name="price" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Purchase Date</label>
        <input type="date" class="form-control" placeholder="Enter the vehicle purchase date" name="pur_dt" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Manufacture Date</label>
        <input type="date" class="form-control" placeholder="Enter the vehicle manufacture date" name="mfg_dt" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Registration Expiry Date</label>
        <input type="date" class="form-control" placeholder="Enter the registration expiry date" name="reg_exp" required>
      </div>


      <button type="submit" class="btn btn-primary btnn" name="submit">Submit</button>
    </form>
  </div>
</body>

</html>