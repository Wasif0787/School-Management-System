<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'db.php';

$sql="select * from `admission`";

$result =  mysqli_query($data,$sql);




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./admin.css">
  <style>
    .content{
      margin-left: 20%;
    }
  </style>
</head>

<body> 
   
    <?php
        include 'admin_sidebar.php'; 
    ?>

<center>
<div class="content" >
  <h1 style="text-align: center;margin-top:30px;">Apply for Admission</h1>
  <br>
  <table border="1px" >
    <tr>
        <th style="padding: 20px; font-size:15px;" >Name</th>
        <th style="padding: 20px; font-size:15px;">Email</th>
        <th style="padding: 20px; font-size:15px;">Phone</th>
        <th style="padding: 20px; font-size:15px;">Message</th>
        <th style="padding: 20px; font-size:15px;">Add</th>
        <th style="padding: 20px; font-size:15px;">Delete</th>
    </tr>
    </tr>

    <?php
    
    while($info=$result->fetch_assoc()){
    ?>

    <tr>
      <td style="padding: 20px;">
        <?php
        echo "{$info['name']}";
        ?> 
      </td>
        <td style="padding: 20px;">
        <?php
        echo "{$info['email']}";
        ?> 
      </td>
        <td style="padding: 20px;">
        <?php
        echo "{$info['phone']}";
        ?> 
      </td>
        <td style="padding: 20px;">
        <?php
        echo "{$info['message']}";
        ?> 
      </td>
      </td>
          <td class="td" style="padding: 20px;">
            <?php
            echo "<a class='btn btn-primary' href='add_student.php?student_id={$info['id']}'>Add</a>";
            ?> 
          </td>
          <td class="td" style="padding: 20px;">
            <?php
            echo "<a class='btn btn-danger' onClick= \"javascript:return confirm('Are You Sure To Delete This')\" href='delete.php?std_id={$info['id']}'>Delete</a>";
            ?> 
          </td>
    </tr>

    <?php
    }
    ?>

  </table>
</div>
</center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>