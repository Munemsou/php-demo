<?php
    include('connection.php');
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = mysqli_real_escape_string($conn, $email);
        $sqlupdate = "UPDATE users SET status = 'confirmed' WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sqlupdate);
    } else {
        die("Invalid email address.");
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->close();
    header("Location: login.php");
    exit();
?>