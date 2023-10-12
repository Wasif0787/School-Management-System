<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'db.php';

if($_GET['student_id']){
    $id=$_GET['student_id'];

$sql2="select * from `admission` where `id`='$id'";

$result2=mysqli_query($data,$sql2);

$info=$result2->fetch_assoc();
}

if(isset($_POST['add_student'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $usertype="student";

    $check="select * from `user` where `username`='$username'";

    $check_user=mysqli_query($data,$check);
    $row_count=mysqli_num_rows($check_user);

    if($row_count==1){
        echo "<script type='text/javascript'> alert('Username already in use. Try another one.');</script>";
    } else {
        $sql="insert into `user`(`username`,`phone`,`email`,`usertype`,`password`) values ('$username','$phone','$email','$usertype','$password')";

    $result=mysqli_query($data,$sql);

    if($result){
        echo "<script type='text/javascript'> alert('Data uploaded Successfully');</script>";
    } else {
        echo "Upload fail";
    }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Student</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <style>
    label{
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px ;
    }
    .div_deg{
        background-color: skyblue;
        width: 500px;
        margin: auto;
        padding-top: 70px;
        padding-bottom: 70px;
        text-align: center;
    }
  </style>
</head>

<body>  
    
<?php
include 'admin_sidebar.php';
?>
<center>


<div class="content" >
  <h1 style="text-align: center;margin-top:30px;" >Add Student</h1>
  <div class="div_deg" >
    <form action="#" method="POST" >
        <div>
            <label for="">Username</label>
            <input type="text" name="name" placeholder="Add a unique username" >
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" id=""
            value="<?php
            echo "{$info['email']}";
            ?>"
            >
        </div>
        <div>
            <label for="">Phone</label>
            <input type="number" name="phone" id=""
            value="<?php
            echo "{$info['phone']}";
            ?>"
            >
        </div>
        <div>
            <label for="">Password</label>
            <input type="text" name="password">
        </div>
        <div style="text-align: center; margin-left:30px;" >
            <input type="submit" class="sbmt btn btn-primary" value="Add Student" name="add_student" >
        </div>
    </form>
  </div>
</div>
</center>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>