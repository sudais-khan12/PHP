<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>

<body>
    <?php
    if (isset($_GET["pID"])) {
        $pID = $_GET["pID"];
    }
    $query = "DELETE FROM `person` WHERE pID = $pID";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    } else {
        header("Location: index.php");
    } ?>
</body>

</html>