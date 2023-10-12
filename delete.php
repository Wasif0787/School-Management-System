<?php
session_start();
include 'db.php';

if($_GET['student_id']){
    $user_id=$_GET['student_id'];
    $sql="delete from `user` where `id`='$user_id'";
    $result = mysqli_query($data, $sql);
    if($result){
        $_SESSION['message']='Deleted Student Successfully';
        header("location:view_student.php");
    }
}

if($_GET['std_id']){
    $user_id=$_GET['std_id'];
    $sql="delete from `admission` where `id`='$user_id'";
    $result = mysqli_query($data, $sql);
    if($result){
        $_SESSION['message']='Deleted Student Successfully';
        header("location:admission.php");
    }
}
?>