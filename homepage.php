<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CAR RENTAL</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <style>
      /* Reset some basic styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: url('images/b.jpg') no-repeat center center fixed;
    background-size: cover;
    height: 100vh;
    color: white;
}


.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
}

.navbar .icon .logo {
    font-size: 2rem;
    font-weight: bold;
    color: #ffcc00;
}

.navbar .menu ul {
    display: flex;
    list-style: none;
}

.navbar .menu ul li {
    margin-right: 20px;
}

.navbar .menu ul li a,
.navbar .menu ul li .adminbtn a {
    color: white;
    text-decoration: none;
    font-size: 1.1rem;
    padding: 8px 16px;
    transition: background-color 0.3s ease;
}

.navbar .menu ul li a:hover,
.navbar .menu ul li .adminbtn a:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 4px;
}

.navbar .menu ul li button.adminbtn {
    border: none;
    background: transparent;
}

.navbar .menu ul li button.adminbtn a {
    font-weight: bold;
}

/* Content Section */
.hai {
    padding-top: 80px; /* To avoid navbar covering content */
    text-align: center;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.content h1 {
    font-size: 4rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: #ffcc00;
}

.content span {
    color: white;
}

.par {
    font-size: 1.2rem;
    margin-bottom: 30px;
    line-height: 1.5;
}

.cn {
    background-color: #ffcc00;
    padding: 15px 30px;
    font-size: 1.1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.cn a {
    text-decoration: none;
    color: black;
}

.cn:hover {
    background-color: #e6b800;
}

/* Footer */
footer {
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: center;
    font-size: 0.9rem;
    color: white;
}

footer a {
    text-decoration: none;
    color: white;
    font-weight: bold;
}


    </style>
</head>
<body>

    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">CrAzy MoToRs</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="about_us.html">ABOUT US</a></li>
                    <li><a href="contact_us.html">CONTACT US</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                    <li><button class="adminbtn"><a href="admin_login.php">ADMIN LOGIN</a></button></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <h1>Rent Your <br><span>Dream Car</span></h1>
            <p class="par">Live the life of Luxury.<br>
                Just rent a car of your wish from our vast collection.<br>Enjoy every moment with your family.<br>
                Join us to make this family vast. </p>
            <button class="cn"><a href="registration.php">JOIN US</a></button>
        </div>
    </div>
</body>
</html>
