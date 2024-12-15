<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A blog website navigation page.">
    <meta name="author" content="Actual Author Name">
    <title>Blog Navigation Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Include Navigation Bar -->
    <?php 
    if (!@include_once 'accountnav.php') {
        echo '<p>Navigation bar could not be loaded.</p>';
    }
    ?>

    <!-- Main Content -->
    <div class="container py-5">
</body>
<!-- Bootstrap JS -->
<script async src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
