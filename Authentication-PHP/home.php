<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php
    include("connection.php");
    session_start();
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
    }
    $query = "SELECT * FROM `user` WHERE `uid` = '$id'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    } else {
        $row = mysqli_fetch_assoc($result);
        if (isset($_SESSION['email'])) { ?>
            <a href="logout.php">Logout</a>
            <a href="http://localhost/crud/index.php" style="text-decoration: none; border: 1px solid black; padding: 1%;;">Go Back</a>
            <h1>User # <?php echo $row['uid']; ?></h1>
            <h2>@<?php echo $row['name']; ?></h2>
            <h3><?php echo $row['email']; ?></h3>
    <?php
        } else {
            header("Location: signup.php");
        }
    }
    ?>
</body>

</html>