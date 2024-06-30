<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body style="padding: 1%;">
    <?php 
    if (isset($_GET["pID"])) {
        $pID = $_GET["pID"];
    }
    $query = "SELECT * FROM `person` WHERE pID = $pID";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    } else {
        $row = mysqli_fetch_assoc($result);
    ?> 
    <a href="http://localhost/crud/index.php" style="text-decoration: none; border: 1px solid black; padding: 1%;;">Go Back</a>
    <h1>Post # <?php echo $row['pID']; ?></h1>
        <h2>@<?php echo $row['name']; ?></h2>
        <h3><?php echo $row['email']; ?></h3>
        <h4><?php echo $row['age']; ?></h4>
    <?php
    } ?>
</body>

</html>