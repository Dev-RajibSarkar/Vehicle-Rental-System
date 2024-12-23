<?php
include 'connect.php';
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $ph_no = $_POST['ph_no'];
  $adhar_no = $_POST['adhar_no'];
  $dl_no = $_POST['dl_no'];
  $dl_validty = $_POST['dl_validity'];
  $gender = $_POST['gender'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  $checkEmailQuery = "SELECT * FROM users WHERE c_email='$email'";
  $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

  if (mysqli_num_rows($checkEmailResult) > 0) {
    echo '<script>alert("Email is already registered. Please use a different email.")</script>';
  } else {
    if ($password != $cpassword) {
      echo '<script>alert("Passwords do not match")</script>';
    } else {
      $sql = "insert into users (c_name, c_email, password, address, ph_no, adhar_no, dl_no, dl_validity, gender) values ('$name', '$email', '$password', '$address', '$ph_no', '$adhar_no', '$dl_no', '$dl_validty', '$gender')";

      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo '<script>alert("Registered Successfully")</script>';
      } else {
        echo die(mysqli_error($conn));
      }
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
  <title>Customer Registration Page</title>
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

    .btnn {
      margin-bottom: 10px;
    }

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
      padding-top: 60px;
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
        <li><a href="customer_login.php">LOGIN</a></li>
      </ul>
    </div>
  </div>

  <div class="container my-3">
    <form method="post">
      <div class="mb-3 my-2">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>

      <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" class="form-control" placeholder="Enter Your Address" name="address" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control" placeholder="Enter Your Phone Number" name=" ph_no" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Adhaar Number</label>
        <input type="text" class="form-control" placeholder="Enter Your Adhaar Number" name=" adhar_no" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Driving License</label>
        <input type="text" class="form-control" placeholder="Enter Your Driving License Number" name="dl_no" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Driving License Validity</label>
        <input type="date" class="form-control" placeholder="Enter Your DL validity date" name="dl_validity" required>
      </div>

      <div class="">
        <label class="form-label">Gender</label>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
      </div>

      <div class="">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="cpassword" required>
      </div>
      <button type="submit" class="btn btn-primary me-3 btnn" name="submit">Submit</button>
      Already a registered customer! <a href="customer_login.php">Login</a>


    </form>
  </div>
</body>

</html>