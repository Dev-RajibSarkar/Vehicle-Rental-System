<?php
include 'connect.php';
session_start();
$id = $_SESSION['c_id'];
$sql = "select * from booking where c_id = '$id'";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($query);
$bookId = $result['book_id'];
$fare = $result['fare'];
$_SESSION['book_id'] = $bookId;
if (isset($_POST['pay'])) {
    $cardno = $_POST['cardno'];
    $exp = $_POST['exp'];
    $cvv = $_POST['cvv'];

    $sql = "insert into payment (book_id, card_id, exp_dt, cvv, fare) values ($bookId, '$cardno', '$exp', $cvv, $fare)";
    $query = mysqli_query($conn, $sql);
    if($query){
      header('location: psuccess.php');
    }
    else{
      echo '<script>alert("Data not inserted")</script>';
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
@import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background:orange url("images/paymentbg.jpg") center/cover;
  overflow: hidden;
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

.card {
  background: linear-gradient(
    to bottom right,
    rgba(255, 255, 255, 0.2),
    rgba(255, 255, 255, 0.05)
  );
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.5), -1px -1px 2px #aaa,
    1px 1px 2px #555;
  backdrop-filter: blur(0.8rem);
  padding: 1.5rem;
  border-radius: 1rem;
  animation: 1s cubic-bezier(0.16, 1, 0.3, 1) cardEnter;
}

.card__row {
  display: flex;
  justify-content: space-between;
  padding-bottom: 2rem;
}

.card__title {
  font-weight: 600;
  font-size: 2.5rem;
  color: black;
  font-weight: 500;
  margin: 1rem 0 1.5rem;
  text-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);
}

.card__col {
  padding-right: 2rem;
}

.card__input {
  background: none;
  border: none;
  border-bottom: dashed 0.2rem rgba(255, 255, 255, 0.15);
  font-size: 1.2rem;
  color: #fff;
  text-shadow: 0 3px 2px rgba(0, 0, 0, 0.3);
}
.card__input--large {
  font-size: 2rem;
}

.card__input::placeholder {
  color: rgba(255, 255, 255, 1);
  text-shadow: none;
}

.card__input:focus {
  outline: none;
  border-color: rgba(255, 255, 255, 0.6);
}

.card__label {
  display: block;
  color: #fff;
  text-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
  font-weight: 400;
}

.card__chip {
  align-self: flex-end;
}

.card__chip img {
  width: 3rem;
}

.card__brand {
  font-size: 3rem;
  color: #fff;
  min-width: 100px;
  min-height: 75px;
  text-align: right;
  text-shadow: 0 2px 2px rgba(0, 0, 0, 0.4);
}

@keyframes cardEnter {
  from {
    transform: translateY(100vh);
    opacity: 0.1;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}
 
.pay{
  width:200px;
  background: #0b5315;

  border:none;
  height: 40px;
  font-size: 18px;
  border-radius: 5px;
  cursor: pointer;
  color:white;
  transition: 0.4s ease;
  margin-left: 100px;
 
}

.pay a{
  text-decoration: none;
  color: black;
  font-weight: bold;
  
}

.btn{
  width:200px;
  background: #d10303;

  border:none;
  height: 40px;
  font-size: 18px;
  border-radius: 5px;
  cursor: pointer;
  color:white;
  transition: 0.4s ease;
}

.btn a{
  text-decoration: none;
  color: white;
  font-weight: bold;
}

.payment{
  margin-top: -550px;
  margin-left: 1000px;
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


    <div class="card">
      <form method="POST">
        
        <h1 class="card__title">Enter Payment Information</h1>
        <h1>Total: <?php echo $fare?></h1>
        <div class="card__row">
          <div class="card__col">
            <label for="cardNumber" class="card__label">Card Number</label
            ><input
              type="text"
              class="card__input card__input--large"
              id="cardNumber"
              placeholder="xxxx-xxxx-xxxx-xxxx"
              required="required"
              name="cardno"
              maxlength="16"
            />
          </div>
          <div class="card__col card__chip">
            <img src="images/chip.svg" alt="chip" />
          </div>
        </div>
        <div class="card__row">
          <div class="card__col">
            <label for="cardExpiry" class="card__label">Expiry Date</label
            ><input
              type="text"
              class="card__input"
              id="cardExpiry"
              placeholder="xx/xx"
              required="required"
              name="exp"
              maxlength="5"
            />
          </div>
          <div class="card__col">
            <label for="cardCcv" class="card__label">CCV</label
            ><input
              type="password"
              class="card__input"
              id="cardCcv"
              placeholder="xxx"
              required="required"
              name="cvv"
              maxlength="3"
            />
          </div>
          <div class="card__col card__brand"><i id="cardBrand"></i></div>
        </div>
        <input type="submit" VALUE="PAY NOW" class="pay" name="pay">
        <button class="btn"><a href="cancelbooking.php">CANCEL</a></button>
  </form>
</div>
</body>

</html>

</body>

</html>