<?php
require_once "connection.php";
session_start();

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    if ($_SESSION["captcha"] == $_POST["captcha"]) {
        $query = "SELECT * FROM users WHERE email = '$email' ";
        $row = mysqli_query($connect, $query);
        if ($row->num_rows != 0) {
            $result = mysqli_fetch_object($row);
            if ($result->password == $password) {
                $_SESSION['login'] = $result->username;
                header("Location:index.php");
            } else {
                echo "
                    <script>
                        alert('Password salah');
                    </script>
                    ";
            }
        } else {
            echo "
                <script>
                    alert('Email tidak terdaftar');
                </script>
                ";
        }
    } else {
        echo "
            <script>
                alert('Captcha salah');
            </script>
            ";
    }
} else {
    echo "
        <script>
            alert('Periksa kembali yang anda masukkan!!!');
        </script>
        ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login App</title>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="login-body">
    <div class="overlay"></div>
    <form action="login.php" method="post" class="box">
        <div class="header">
            <h1 class="text-center">Table Preview</h1>
            <!-- <p>Hallo Selamat Siang!!!</p> -->
        </div>
        <div class="login-area">
            <h4 class="text-info text-gradient fw-bold fst-italic">Login To Your Account</h4>
            <input type="text" name="email" placeholder="Masukkan Email" class="email">
            <input type="password" name="password" placeholder="Masukkan Password" class="password">
            <img src="captchagenerator.php" alt="" class="captcha-img">
            <input type="text" name="captcha" placeholder="Masukkan Captcha" class="captcha">
            <input type="submit" value="submit" name="submit" class="submit">

            <div class="text-center pt-0 px-lg-2 px-1">
                <p class="mb-4 text-sm mx-auto">
                    Tidak Mempunyai Akun?
                    <a href="javascript: register();" class="text-info text-gradient fw-bold">Register Sekarang</a>
                </p>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <script>
        function register() {
            validasi = confirm("Apakah Anda Yakin Ingin Mendaftar?");
            if (validasi == true) {
                window.location.href = "register.php";
            }
        }
    </script>
</body>

</html>