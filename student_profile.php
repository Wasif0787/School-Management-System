<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'admin') { // Remove the extra space here
    header("location:login.php");
}

include 'db.php';
$name = $_SESSION['username'];
$sql = "select * from `user` where `username`='$name'";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $query = "update `user` set `email`='$email',`phone`='$phone',`password`='$password' where `username`='$name'";
    $result2 = mysqli_query($data, $query);
    if ($result2) {
        header("location:student_profile.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <style>
    .content{
        margin-left: 25%;
        margin-top: 5%;
    }
    .div_deg{
        background-color: skyblue;
        width: 500px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
    label{
        display: inline-block;
        text-align: right;
        width: 100px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .control{
        text-align: left;
        width: 300px;
        padding-left: 0;
    }
  </style>
</head>

<body> 
  
  <?php
  include 'student_sidebar.php';
  ?>

<div class="content">
    <center>
        <h1>Update Profile</h1>
        <br><br>
        <form action="#" method="POST">
        <div class="div_deg">
    <div>
        <label for="">Email</label>
        <input class="control" type="text" name="email" value="<?php echo "{$info['email']}"; ?>">
    </div>
    <div>
        <label for="">Phone</label>
        <input class="control" type="text" name="phone" value="<?php echo "{$info['phone']}"; ?>">
    </div>
    <div>
        <label for="">Password</label>
        <input class="control" type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
    </div>
    <div>
        <input class="btn btn-primary" type="submit" name="update_profile" value="Update">
    </div>
</div>
        </form>
    </center>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>