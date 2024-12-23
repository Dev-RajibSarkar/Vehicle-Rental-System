<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $query = "select * from owner where email='$email'";
  $result = mysqli_query($conn, $query);
  if ($row = mysqli_fetch_assoc($result)) {
    $db_password = $row['password'];
    $id = $row['c_id'];
    if (($pass)  == $db_password) {
      header("location: vehicle_entry.php");
      session_start();
      $_SESSION['c_email'] = $email;
      $_SESSION['c_id'] = $id;
    }
  } 
  else {
    if ($db_password = $row['password']) {
      echo '<script>alert("Enter a proper password")</script>';
    } else {
      echo '<script>alert("enter a proper email")</script>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background: url('images/loginbg.jpg') no-repeat center center fixed;
      background-size: cover;
      color: white;
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
        <li><a href="owner_register.php">REGISTER</a></li>
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
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <div>
        <button type="submit" class="btn btn-primary my-2" name="submit">LOGIN</button>
      </div>
      Don't have an account? <a href="owner_register.php">Register Now</a>
      <a href="oforgot_password.php">Forgot Password</a>


    </form>
  </div>

</body>

</html>