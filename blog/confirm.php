<?php
    include 'connection.php';
    $email = $_POST['email'];
    $sqlupdate = "UPDATE users SET status = 'confirmed' WHERE email = '$email'";
    $result = mysqli_query($conn, $sqlupdate);
    header("Location: login.php");
?>