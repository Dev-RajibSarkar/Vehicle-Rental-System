<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];

  $checkEmailQuery = "SELECT * FROM users WHERE c_email='$email'";
  $checkEmailResult = mysqli_query($conn, $checkEmailQuery);
  if (mysqli_num_rows($checkEmailResult) == 0) {
    echo '<script>alert("This email does not exist")</script>';
  } else {
    if ($pass == $cpass) {
      $update = "UPDATE users set password = '$pass' where c_email= '$email'";
      echo '<script>alert("Password resetted successfully")</script>';
    } else {
      echo '<script>alert("The passwords do not match")</script>';
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: url('images/loginbg.jpg') no-repeat center center fixed;
      background-size: cover;
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
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT US</a></li>
        <li><a href="customer_login.php">LOGIN</a></li>
      </ul>
    </div>
  </div>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Enter New Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" required>
      </div>

      <div>
        <button type="submit" class="btn btn-primary my-2" name="submit">RESET</button>
      </div>
    </form>
  </div>
</body>

</html>