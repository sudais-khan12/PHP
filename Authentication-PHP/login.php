<?php
include("connection.php");
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $createquery = "INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email','$hash')";
    $checkquery = "SELECT * FROM `user` WHERE `email` = '$email'";

    if (empty($email) || empty($name) || empty($password)) {
        header("Location: login.php?message=empty");
    } else {
        $result = mysqli_query($conn, $checkquery);
        if (!$result) {
            die("something went wrong");
        } else {
            $row = mysqli_num_rows($result);
            if ($row == 0) {
                if (mysqli_query($conn, $createquery)) {
                    $searchuser = "SELECT * FROM `user` WHERE `email` = '$email'";
                    $user = mysqli_fetch_assoc(mysqli_query($conn, $checkquery));
                    $id = $user['uid'];
                    $_SESSION ['email']= $user['email'];
                    header("Location: home.php?id=$id");
                }
            } else {
                header("Location: login.php?message=duplicate");
            }
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
    <title>Login</title>
</head>

<body>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'empty') { ?> <h1 style="color: red;">Please fill all the fields 👇</h1> <?php } ?>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'duplicate') { ?> <h1 style="color: red;">User Already Exist 😕</h1> <?php } ?>
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
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <a class="add" href="http://localhost/login-signup/signup.php">Signup</a>
</body>

</html>