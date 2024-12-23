<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>

* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }
        body {
            font-family: Arial, sans-serif;
            background: url('images/b.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 20px;
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

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 15px;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .card-content {
            padding: 15px;
        }
        .card-title {
            font-size: 18px;
            margin: 0;
        }
        .card-price {
            font-size: 16px;
            color: #888;
        }
        .card-button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            width: 100%;
            margin-top: 10px;
        }
        .card-button:hover {
            background-color: #218838;
        }
    </style>
</head>
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

<?php
    include 'connect.php'; 
    session_start();
    $sql = "SELECT * FROM vehicles where available = 'Y'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $carId = $row['v_id']; 
            ?>
            <div class="card">
                <img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['v_name']; ?>">
                <div class="card-content">
                    <h2 class="card-title"><?php echo $row['v_name']; ?></h2>
                    <p class="card-price">Fuel Type: <?php echo $row['type']; ?></p>
                    <p class="card-price">Capacity: <?php echo $row['capacity']; ?></p>
                    <p class="card-price">Mileage: <?php echo $row['milage']; ?></p>
                    <p class="card-price">Rent Per Day: ₹<?php echo $row['price']; ?>/-</p>
                    <form method="POST" action="booking.php">
                        <button type="submit" name="booknow" class="card-button"><a href="booking.php?id=<?php echo $carId; ?>" style="text-decoration: none; color:white" >Book now</a></button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p>No vehicles available.</p>";
    }
?>

</body>
</html>