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
} else {
    echo "
        <script>
            alert('Perubahan tidak disimpan');
        </script>
        ";
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register App</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="register-body">

    <div class="container-fluid bg-dark text-light py-3">
        <header class="text-center">
            <h1 class="display-6">Sign Up To Our Website</h1>
        </header>
    </div>
    <section class="container my-2 bg-dark w-50 text-light p-2">
        <form class="row g-3 p-3" method="post" action="register.php">
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">First name</label>
                <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Last name</label>
                <input type="text" class="form-control" id="validationDefault02" value="Otto" required>
            </div>
            <div class="col-md-4">
                <label for="validationDefaultUsername" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                    <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required name="username">
                </div>
            </div>
            <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail4" name="email">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="password">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="inputPassword4" name="cpassword">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Daerah Kelahiran">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Tanggal Lahir</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="01-01-2000">
            </div>
            <!-- <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div> -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary" value="submit" name="submit">Sign Up</button>
            </div>
        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>