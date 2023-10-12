<?php
// error_reporting(0);
session_start();
include './db.php';

if ($data == false) {
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "select * from `user` where `username`='$username' and `password`='$pass'";

    $result = mysqli_query($data, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);

        if ($row) { // Check if $row is not null
            if ($row["usertype"] == "student") {
                $_SESSION['username'] = $username;
                $_SESSION['usertype'] = "student";
                header("location:studenthome.php");
            } else if ($row["usertype"] == "admin") {
                $_SESSION['username'] = $username;
                $_SESSION['usertype'] = "admin";
                header("location:adminhome.php");
            }
        } else {
            $message = "Username or password do not match";
            $_SESSION['loginMessage'] = $message;
            header("location:login.php");
        }
    } else {
        die("Query failed: " . mysqli_error($data));
    }
}
?>
