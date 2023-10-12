<?php
error_reporting(0);
session_start();

include 'db.php';

if ($data === false) {
    die("Connection error");
}

if (isset($_POST['apply'])) {
    $name = mysqli_real_escape_string($data, $_POST['name']);
    $phone = mysqli_real_escape_string($data, $_POST['phone']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $message = mysqli_real_escape_string($data, $_POST['message']);

    $sql = "INSERT INTO `admission` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message')"; 

    if (mysqli_query($data, $sql)) {
        $_SESSION['message'] = "Your Application has been sent successfully";
        header("location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($data);
    }
}
?>
