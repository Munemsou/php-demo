<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <form>
        <input type="number" name="y">
        <input type="submit" value="go">
    </form>
   <!-- <?php // While loop
    // Check if the 'y' parameter is set in the URL
    if (isset($_GET['y'])) {
        $x = 1; // Initialize $x to 1
        $y = $_GET['y']; // Get the value of 'y' from the URL
        // Loop from $x to $y
        while ($x <= $y) {
            echo "{$x}<br>"; // Output the current value of $x followed by a line break
            $x++; // Increment $x by 1
        }
    }
    ?>  -->
    <!-- <?php // Do-while loop
    if (isset($_GET['y'])) {
        $x = 1;
        $y = $_GET['y'];
        do {
            echo "{$x}<br>";
            $x++;
        }
        while ($x <= $y);
    }
    ?> -->
    <?php // For loop
    if (isset($_GET['y'])) {
        $y = $_GET['y'];
        for ($x = 1; $x <= $y; $x++) {
            echo "{$x}<br>";
        }
    }
    ?>
    <!-- <?php // Foreach loop
    $names = array('Alice', 'Bob', 'Charlie', 'David');
    foreach ($names as $name) {
        echo "{$name}<br>";
    }
    ?>
    <?php // Foreach loop with key
    $names = array('Alice', 'Bob', 'Charlie', 'David');
    foreach ($names as $key => $name) {
        echo "{$key}: {$name}<br>";
    }
    ?>
    <?php // Foreach loop with associative array
$person = array('name' => 'Alice    ', 'age' =>_(''));  // 'Alice' => 'Alice' is the key and value  // 'age' => 20 is the key and value  
foreach ($person as $key => $value) {
    echo "{$key}: {$value}<br>";
}
?> -->
    
</body>

</html>