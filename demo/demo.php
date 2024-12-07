<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Hello</h1>
    <form method="post">
        <?php
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $person = $_POST['username'];
            } else {
                $person = 'Guest';
            }
            $username = $_POST['username'];
            $password = $_POST['password'];
        ?>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <br>

        <label><input type="radio" name="gender" value="male">male</label>
        <label><input type="radio" name="gender" value="female">female</label>

        <br>

        <input type="submit" value="login">
    </form>
    <?php
    echo 'Hello ' . $person . "<br>";
    $gender = $_POST['gender'];
    switch ($gender) {
        case 'female':
            echo 'Female';
            break;
        case 'male':
            echo 'Male';
            break;
    }
    ?>
</body>
</html>