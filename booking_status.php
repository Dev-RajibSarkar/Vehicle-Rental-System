<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>BOOKING STATUS</title>
</head>
<body>
<style>

*{
    margin: 0;
    padding: 0;

}

body{
    background: url("images/carbg2.jpg");
    background-position: center;
   
}
.box{
    padding: 20px;
    box-sizing: border-box;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 5px 15px rgba(0,0,0,.5);
    background: linear-gradient(to top, rgba(255, 251, 251, 1)70%,rgba(250, 246, 246, 1)90%);
    display: flex;
    align-content: center;
    width: 700px;
    height: 250px;
    margin-top: 35px;
    margin-left: 415px;
  
    
}


.box .content{
    margin-left: 5px;
    font-size: larger;
}

.box .button{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border:none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
}

.utton{
    width: 200px;
    height: 40px;
   
    background: #ff7200;
    border:none;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color:#fff;
    transition: 0.4s ease;
    margin-top: 10px;
    margin-left: 10px;
}
.utton a{
    text-decoration: none;
    color: white;
    font-weight: bold;
}

ul{
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
}

ul li{
    list-style: none;
    margin-left: 200px;
    margin-top: -130px;
    font-size: 35px;

}
.name{
    font-weight: bold;
}

</style>

<button class="btn btn-primary mt-5 ms-5"><a class="text-light" style="text-decoration: none;" href="car_details.php">Home</a></button>

<?php
require_once('connect.php');
session_start();
$email = $_SESSION['c_email'];
$id = $_SESSION['c_id'];

$sql = "SELECT * FROM booking WHERE c_id ='$id'";
$name = mysqli_query($conn, $sql);

if (mysqli_num_rows($name) == 0) {
    echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
    echo '<script> window.location.href = "car_details.php";</script>';
} else {
    $sql2 = "SELECT * FROM users WHERE c_email='$email'";
    $name2 = mysqli_query($conn, $sql2);
    $rows2 = mysqli_fetch_assoc($name2);
    $c_name = $rows2['c_name'];

    while ($row = mysqli_fetch_assoc($name)) {
        $car_id = $row['v_id'];
        $sql3 = "SELECT * FROM vehicles WHERE v_id='$car_id'";
        $name3 = mysqli_query($conn, $sql3);
        $rows3 = mysqli_fetch_assoc($name3);
        $v_name = $rows3['v_name'];
        $dur = $row['duration'];
        $status = $row['status'];

        echo '<div class="box">
                <div class="content">
                    <h1>CAR NAME : '.$v_name.'</h1><br>
                    <h1>NO OF DAYS : '.$dur.' </h1><br>
                    <h1>BOOKING STATUS : '.$status.'</h1><br>
                </div>
              </div>';
    }
}
?>
    
</body>
</html>