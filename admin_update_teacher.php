<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
  header("location:login.php");
} else if ($_SESSION['usertype'] == 'student') {
  header("location:login.php");
}
include 'db.php';
if ($_GET['teacher_id']) {
  $id = $_GET['teacher_id'];

  $sql = "select * from `teacher` where `id`='$id'";

  $result = mysqli_query($data, $sql);

  $info = $result->fetch_assoc();
}
if (isset($_POST['update_teacher'])) {
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $file = $_FILES['image']['name'];
  $dst = "./image/" . $file;
  $dst_db = "image/" . $file;
  move_uploaded_file($_FILES['image']['tmp_name'], $dst);

  if($file){
    $query = "update `teacher` set `name`='$name',`description`='$desc',`image`='$dst_db' where `id`='$id'";
  } else {
    $query = "update `teacher` set `name`='$name',`description`='$desc' where `id`='$id'";
  }



  $result2 = mysqli_query($data, $query);

  if ($result2) {
    header("location:admin_view_teacher.php");
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
        width: 150px;
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .div_deg{
        background-color: skyblue;
        width: 600px;
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

    
  <h1 style="text-align: center;margin-top:30px;" >Update Teacher</h1>
  <div class="div_deg" >  
    <form action="#" method="POST" enctype="multipart/form-data" >
        <div>
            <label>Teacher Name</label>
            <input type="text" name="name" id="" 
            value="<?php
            echo "{$info['name']}";
            ?>"
            >
        </div>
        <div>
        <label>Teacher Description</label>
        <textarea name="desc" id="desc"><?php echo $info['description']; ?></textarea>
        </div>
        <div>
            <label>Teacher Old Image</label>
            <img height="100px" width="100px"  class="teacher" src="<?php echo "{$info['image']}" ?>" alt="">
        </div> 
        <div>
            <label>Teacher New Image</label>
            <input type="file" name="image" id="">
        </div>
        <div>
            <input class="btn btn-success" type="submit" name="update_teacher" id=""  value="update">
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