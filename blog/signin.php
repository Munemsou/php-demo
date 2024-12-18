<?php
if (isset($_POST['save'])) {
    include 'connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : '';
    // Hash the password (assuming the database already has hashed passwords)
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt->execute();
   
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $cookie_name = "username";
            $cookie_value = $username;
            if (isset($_POST['remember'])) {
                // Set cookie for 30 days if "Remember Me" is checked
                setcookie($cookie_name, $cookie_value, time() + 86400 * 30, "/");
            } else {
                // Set cookie for 1 hour if not
                setcookie($cookie_name, $cookie_value, time() + 3600, "/");
            }

            // Redirect to homepage
            header("Location: index.php");
           
            exit;
        }
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Create Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="icon" href="https://icons.iconarchive.com/icons/emey87/social-button/16/blog-icon.png">
</head>

<body>
    <?php include 'accountnav.php'; ?>

    <div class="container py-5">
        <form method="POST">
            <fieldset>
                <legend>Log in to your Account</legend>

                <div class="row">
                    <!-- Username -->
                    <div class="mb-3 col-sm-10">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3 col-sm-10">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check form-switch col-sm-10 m-2">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                </div>

                <!-- Forgot Password -->
                 <div >
                    <a class="link-primary link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover" href="recover.php">Forgot your password?</a>
                </div>
                <!-- Submit Button -->
                <button type="submit" name="save" class="btn btn-outline-dark btn-lg mt-3">Log in</button>
            </fieldset>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>


