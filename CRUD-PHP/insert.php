<?php
include("connection.php");
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    $query = "INSERT INTO `person`(`name`, `email`, `age`, `password`) VALUES ('$name','$email','$age','$password')";

    if (empty($email) || empty($name) || empty($age) || empty($password)) {
        header("Location: insert.php?message=empty");
    } else {
        if (mysqli_query($conn, $query)) {
            echo "New record created successfully";
            header("Location: index.php");
        } else {
            echo "Error: "($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Insertion</title>
</head>

<body>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'empty') { ?> <script> alert("Please fill all the fields")</script> <?php } ?>
    <div class="container home mt-3">
        <a class="add" href="http://localhost/crud/index.php">Go Home</a>
    </div>
    <div class="container mt-5">
        <form method="post" action="#">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Age</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="age">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>