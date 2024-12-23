<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANCEL BOOKING</title>
</head>

<body>
    <style>
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

        .form {
            align-content: center;
            margin-left: 350px;
            margin-top: 150px;
        }

        .hai {
            width: 200px;
            height: 40px;

            background: #ff7200;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            margin-left: 90px;
        }

        .no {
            width: 200px;
            height: 40px;

            background: #ff7200;
            border: none;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            margin-left: 100px;
        }

        .no a {
            text-decoration: none;
            color: white;
        }
    </style>
    <?php

    include 'connect.php';
    session_start();
    $bid = $_SESSION['book_id'];
    if (isset($_POST['cancelnow'])) {
        $del = mysqli_query($conn, "delete from booking where BOOK_ID = '$bid' order by BOOK_ID DESC limit 1");
        echo "<script>window.location.href='car_details.php';</script>";
    }


    ?>
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

    <form class="form" method="POST">
        <h1>ARE YOU SURE YOU WANT TO CANCEL YOUR BOOKING?</h1>
        <input type="submit" class="hai" value="CANCEL NOW" name="cancelnow">
        <button class="no"><a href="payment.php">GO TO PAYMENT</a></button>
    </form>
</body>

</html>