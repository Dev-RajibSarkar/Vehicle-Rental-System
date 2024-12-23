<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $role = $_POST['role'];
  if ($role == 'user') {
    $message = "You selected to register as a User!";
    header('location: customer_registration.php');
  } elseif ($role == 'owner') {
    $message = "You selected to register as an Owner!";
    header('location: owner_register.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register as Customer or Owner</title>
  <link rel="stylesheet" href="styles.css">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
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
      color: black;
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
    }
    .container {
      text-align: center;
      padding: 50px;
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin: 210px auto;
      max-width: 400px;
      border-radius: 8px;
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    .options {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .role-button {
      background-color: #007bff;
      color: white;
      padding: 15px 30px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .role-button:hover {
      background-color: #0056b3;
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
        <li><a href="login.php">LOGIN</a></li>
      </ul>
    </div>
  </div>

  <div class="container">
    <h1>Choose Your Role</h1>

    <form method="POST" action="">
      <div class="options">
        <button type="submit" name="role" value="user" class="role-button">Register as Customer</button>
        <button type="submit" name="role" value="owner" class="role-button">Register as Owner</button>
      </div>
  </form>

  </div>

</body>

</html>