<?php
include("connection.php");
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkquery = "SELECT * FROM `user` WHERE `email` = '$email'";


    if (empty($email) || empty($password)) {
        // header("Location: signup.php?message=empty");
?> <script>
            alert("Please Fill All the Fields");
        </script> <?php
                } else {
                    $result = mysqli_query($conn, $checkquery);
                    if (!$result) {
                        die("something went wrong");
                    } else {
                        $user = mysqli_fetch_assoc($result);
                        $id = $user['uid'];
                        $row = mysqli_num_rows($result);
                        if ($row == 1) {
                            if (password_verify($password, $user['password'])) {
                                $_SESSION['email'] = $user['email'];
                                header("Location: home.php?id=$id");
                            } else {
                                header("Location: signup.php?message=incorrect");
                            }
                        } else {
                            header("Location: signup.php?message=incorrect");
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
    <title>Signup</title>
</head>

<body>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'empty') { ?> <script>
            alert("Please fill all the fields")
        </script> <?php } ?>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'incorrect') { ?> <script>
            alert("Email Or Password Incorrect");
        </script> <?php } ?>
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
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
    <a class="add" href="http://localhost/login-signup/login.php">Login</a>
</body>

</html>