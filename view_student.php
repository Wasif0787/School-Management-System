<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'db.php';

$sql = "select * from `user` where `usertype`='student'";

$result = mysqli_query($data, $sql);




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./admin.css">
  <style>
    .td{
      background-color: skyblue;
    }
    .content{
        padding-left:25%;
        padding-top:5%;
    }
  </style>
</head>

<body> 
   
    <?php
    include 'admin_sidebar.php';
    ?>

<div class="content" >
    <center>
  <h1 style="text-align:center;margin-top:30px;">Student Data</h1>
  <?php
  if($_SESSION['$message']){
    echo $_SESSION['$message'];
  }
  unset($_SESSION['$message']);
  ?>
  <br>
  <table border="1px" >
    <tr>
        <th style="padding: 20px; font-size:15px;" >Username</th>
        <th style="padding: 20px; font-size:15px;">Email</th>
        <th style="padding: 20px; font-size:15px;">Phone</th>
        <th style="padding: 20px; font-size:15px;">Password</th>
        <th style="padding: 20px; font-size:15px;">Delete</th>
        <th style="padding: 20px; font-size:15px;">Update</th>
    </tr>

    <?php

    while ($info = $result->fetch_assoc()) {
        ?>

        <tr>
          <td class="td" style="padding: 20px;">
            <?php
            echo "{$info['username']}";
            ?> 
          </td>
            <td class="td" style="padding: 20px;">
            <?php
            echo "{$info['email']}";
            ?> 
          </td>
            <td class="td" style="padding: 20px;">
            <?php
            echo "{$info['phone']}";
            ?> 
          </td>
            <td class="td" style="padding: 20px;">
            <?php
            echo "{$info['password']}";
            ?> 
          </td>
          <td class="td" style="padding: 20px;">
            <?php
            echo "<a class='btn btn-danger' onClick= \"javascript:return confirm('Are You Sure To Delete This')\" href='delete.php?student_id={$info['id']}'>Delete</a>";
            ?> 
          </td>
          <td class="td" style="padding: 20px;">
            <?php
            echo "<a class='btn btn-primary' href='update_student.php?student_id={$info['id']}'>Update</a>";
            ?> 
          </td>
        </tr>

        <?php
    }
    ?>

  </table>
  </center>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>