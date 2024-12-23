<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $pin = $_POST['pin'];
  $ph_no = $_POST['ph_no'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $checkEmailQuery = "SELECT * FROM owner WHERE email='$email'";
  $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

  if (mysqli_num_rows($checkEmailResult) > 0) {
    echo '<script>alert("Email is already registered. Please use a different email.")</script>';
  } else {
    $sql = "insert into owner (name, email, password, ph_no, address, pincode) values ('$name', '$email', '$password', '$ph_no', '$address', '$pin')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo '<script>alert("Registered Successfully")</script>';
    } else {
      echo die(mysqli_error($conn));
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Owner Registration Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background: url('images/registrationbg.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      color: white;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 40px;
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
        <li><a href="owner_login.php">LOGIN</a></li>
      </ul>
    </div>
  </div>

  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control" placeholder="Enter Your Phone Number" name=" ph_no" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" placeholder="Enter Your Address" name="address" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Pin code</label>
        <input type="text" class="form-control" placeholder="Enter Your Pin Code" name="pin" required>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" required>
      </div>
      <button type="submit" class="btn btn-primary me-2" name="submit">Submit</button>
      Already a registered owner! <a href="owner_login.php">Login</a>
    </form>
  </div>
</body>

</html>