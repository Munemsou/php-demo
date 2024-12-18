<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A blog website navigation page.">
    <meta name="author" content="Actual Author Name">
    <title>Welcome to Blog</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php include 'connection.php'; ?>
</head>

<body>
    <!-- Include Navigation Bar -->
    <?php include 'accountnav.php'; ?>

    <!-- Main Content -->
    <div class="container py-5">
        <h1>Blog Navigation Page</h1>
        <p>This is the main content of the blog navigation page.</p>
    </div>
    <?php
    if (isset($_COOKIE['username'])) {
        ?>
        <form method="POST" class="container">
            <input type="text" name="title" class="form-control" placeholder="Title">
            <textarea name="newpost" class="form-control mt-2" placeholder="Content"></textarea>
            <input type="submit" name="save" class="btn btn-primary mt-2" value="Post">
        </form>
    <?php }
    $sql = "SELECT * FROM posts order by postid desc";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='container col-md-6 h-100 p-5 text-bg-dark rounded-3 mt-2'>";
        echo "<h1 class= 'display-3'>" . $row['title'] . "</h1>";
        echo "<h3>" . $row['username'] . "</h3>";
        echo "<h5>" . $row["timestamp"] . "</h5>";
        echo "<p>" . $row['post'] . "</p> </div>";
    }
    ?>
    </div>
</body>

</html>
<?php if (isset($_POST['save'])) {
    $username = $_COOKIE['username'];
    $title = $_POST['title'];
    $post = $_POST['newpost'];
    $sqlinsert = "INSERT INTO posts (username, title, post) VALUES ('$username', '$title', '$post')";
    $result = mysqli_query($conn, $sqlinsert);
}

?>