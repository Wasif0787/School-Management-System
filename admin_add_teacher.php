<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

// Check for success message
if (isset($_SESSION['success_message'])) {
    echo "<script type='text/javascript'> alert('{$_SESSION['success_message']}');</script>";
    // Clear the session variable to avoid displaying the message again on page refresh
    unset($_SESSION['success_message']);
}

include 'db.php';

if(isset($_POST['add_teacher'])){
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;
    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql="insert into `teacher` (`name`,`description`,`image`) values ('$name','$desc','$dst_db')";


    $result=mysqli_query($data,$sql);

    if($result){
        $_SESSION['success_message'] = 'Data uploaded Successfully';
        header('location:admin_add_teacher.php');
    } else {
        echo "Upload fail";
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
    .content{
        margin-top: 5%;
        margin-left: 25%;
    }
    .div_deg{
        background-color: lightblue;
        width: 600px;
        padding-top: 70px;
        padding-bottom: 70px;
    }
  </style>
</head>

<body> 
    
<?php
include 'admin_sidebar.php';
?>

<div class="content" >
    <center>
        <h1>Add Teacher</h1>
        <br> 
        <div class="div_deg">
        <form action="#" method="POST" enctype="multipart/form-data" >
            <div>
                <label for="">Teacher name : </label>
                <input type="text" name="name" id="">
            </div>
            <br>
            <div>
                <label for="">Teacher Description : </label>
                <textarea name="desc" id=""></textarea>
            </div>
            <br>
            <div>
                <label for="">Teacher Photo : </label>
                <input type="file" name="image" id="">
            </div>
            <br>
            <div>
                <input class="btn btn-primary" type="submit" value="Add Teacher" name="add_teacher" >
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