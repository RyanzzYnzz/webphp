<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) 
    && isset($_POST['email']) && isset($_POST['re_password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    $re_pass = validate($_POST['re_password']);
    $email = validate($_POST['email']);

    $user_data = 'uname=' . $uname . '&email=' . $email;

    // Validasi input kosong
    if (empty($uname)) {
        header("Location: signup.php?error=Username is required&$user_data");
        exit();
    } else if (empty($pass)) {
        header("Location: signup.php?error=Password is required&$user_data");
        exit();
    } else if (empty($re_pass)) {
        header("Location: signup.php?error=Re-password is required&$user_data");
        exit();
    } else if (empty($email)) {
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    } else if ($pass !== $re_pass) {
        header("Location: signup.php?error=The confirmation password does not match&$user_data");
        exit();
    } else {
        // Hashing password
        $pass_hashed = md5($pass);

        // Periksa apakah username sudah ada
        $sql = "SELECT * FROM user WHERE user_name='$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: signup.php?error=The username is already taken, try another&$user_data");
            exit();
        } else {
            // Insert data ke database
            $sql2 = "INSERT INTO user(user_name, password, email) VALUES('$uname', '$pass_hashed', '$email')";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: signup.php?success=Your account has been created successfully");
                exit();
            } else {
                header("Location: signup.php?error=An unknown error occurred&$user_data");
                exit();
            }
        }
    }
} else {
    header("Location: signup.php");
    exit();
}