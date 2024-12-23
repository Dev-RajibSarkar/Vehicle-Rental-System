<?php
  $conn = new mysqli('localhost', 'root', '', 'vehicle_rental_system');

  if(!$conn){
    echo die(mysqli_error($conn));
  }
?>