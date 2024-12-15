<?php
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://icons.iconarchive.com/icons/emey87/social-button/16/blog-icon.png">
</head>

<body>
    <?php include 'accountnav.php'; ?>

    <div class="container py-5">
        <form method="POST">
            <fieldset>
                <legend>Password Recovery</legend>

                <div class="row">
                    <!-- Username -->
                    <div class="mb-3 col-sm-10">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3 col-sm-10">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="recover" class="btn btn-outline-dark btn-lg mt-3">Recover Password</button>
            </fieldset>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['recover'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);

        $sql = "SELECT * FROM users WHERE username = ? AND email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $password = $row['password'];
            $subject = "Password Recovery";
            $message = "Your password is: $password";
            mail($email, $subject, $message);
            echo "<script>alert('Password sent to your email.');</script>";
        } else {
            echo "<script>alert('Invalid username or email.');</script>";
        }
    } else {
        echo "<script>alert('Invalid email address.');</script>";
    }
} else {
    echo "<script>alert('Please enter your username and email.');</script>";
}