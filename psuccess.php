<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Success</title>
</head>
<style>
  * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
  body {
    text-align: center;
    background: url("images/paymentbg.jpg") center/cover;;
    background-repeat: no-repeat;
    background-position: center;
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

  h1 {
    color: #88B04B;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-weight: 900;
    font-size: 40px;
    margin-bottom: 10px;
  }

  p {
    color: #404F5E;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-size: 20px;
    margin: 0;
  }

  i {
    color: #9ABC66;
    font-size: 100px;
    line-height: 200px;
    margin-left: -15px;
  }

  .card {
    background: white;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 3px #C8D0D8;
    display: inline-block;
    margin-top: 100px;
  }

  #back {
    width: 150px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 10px;
    margin-left: 65px;
    font-size: 18px;
  }

  #back a {
    text-decoration: none;
    color: black;
    font-weight: bold;
  }

  .ba {
    width: 1px;

  }
</style>

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


  <div class="card">
    <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
      <i class="checkmark">✓</i>
    </div>
    <h1>Success</h1>
    <p>We received your rental request;<br /> we'll be in touch shortly!</p>
    <div class="ba"><button id="back"><a href="car_details.php">Search Cars</a></button></div>

  </div>
</body>

</html>