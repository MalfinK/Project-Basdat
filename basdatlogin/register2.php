<?php
require_once "connection.php";
session_start();
echo $_SESSION["captcha"];

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $cpassword = md5($_POST["cpassword"]);
    // var_dump($password == $cpassword);
    // die;
    if ($password == $cpassword) {
        $query = "SELECT * FROM users WHERE email = '$email'";
        $row = mysqli_query($connect, $query);
        if ($row->num_rows == 0) {
            $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
            $row = mysqli_query($connect, $query);
            header("Location:index.php");
        } else {
            echo "email udah dipake";
        }
    } else {
        echo "password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register App</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>halo</h1>
    <form action="register.php" method="post">
        <label for="email">email</label><br>
        <input type="text" name="email"><br><br>
        <label for="username">username</label><br>
        <input type="text" name="username"><br><br>
        <label for="password">password</label><br>
        <input type="password" name="password"><br><br>
        <label for="cpassword">confirm password</label><br>
        <input type="password" name="cpassword"> <br><br>
        <input type="submit" value="submit" name="submit">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>