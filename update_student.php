<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}
include 'db.php';

$id=$_GET['student_id'];

$sql="select * from `user` where `id`='$id'";

$result=mysqli_query($data,$sql);

$info=$result->fetch_assoc();

if(isset($_POST['update'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];

    $query="update `user` set `username`='$name',`email`='$email',`phone`='$phone',`password`='$password' where `id`='$id'";

    $result2=mysqli_query($data,$query);

    if($result2){
        header("location:view_student.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <style>
    label{
        display: inline-block;
        width: 100px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .div_deg{
        background-color: skyblue;
        width: 400px;
        padding-bottom: 70px;
        padding-top: 70px;
    }
  </style>
</head>

<body> 
    
<?php
include 'admin_sidebar.php';
?>

<div class="content" >
    <center>

    
  <h1 style="text-align: center;margin-top:30px;" >Update Student</h1>
  <div class="div_deg" >  
    <form action="#" method="POST">
        <div>
            <label>Username</label>
            <input type="text" name="name" id="" 
            value="<?php
            echo "{$info['username']}";
            ?>"
            >
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" id=""
            value="<?php
            echo "{$info['email']}";
            ?>"
            >
        </div>
        <div>
            <label>Phone</label>
            <input type="number" name="phone" id=""
            value="<?php
            echo "{$info['phone']}";
            ?>"
            >
        </div> 
        <div>
            <label>Password</label>
            <input type="text" name="password" id=""
            value="<?php
            echo "{$info['password']}";
            ?>"
            >
        </div>
        <div>
            <input class="btn btn-success" type="submit" name="update" id=""  value="update">
        </div>
    </form>
  </div>
  </center> 
</div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>