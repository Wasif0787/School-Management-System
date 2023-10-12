<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'db.php';

$sql = "select * from `teacher`";

$result = mysqli_query($data, $sql);

if ($_GET['teacher_id']) {
    $t_id = $_GET['teacher_id'];
    $query = "delete from `teacher` where `id`='$t_id'";
    $result2 = mysqli_query($data, $query);

    if ($result2) {
        header('location:admin_view_teacher.php');
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
    table{
        margin-top: 40px;
    }
    .content{
        margin-top: 5%;
        margin-left: 25%;
    }
    .table_th{
        padding: 20px; 
        font-size:15px;
    }
    .table_td{
        padding: 20px;
        background-color: skyblue;
    }
  </style>
</head>

<body> 
    
<?php
include 'admin_sidebar.php';
?>

<div class="content" >
    <center>
        <h1>View All Teacher Data</h1>
        <table border="1px" > 
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Teacher Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>
            <?php
            while ($info = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['name']}" ?></td>
                    <td class="table_td"><?php echo "{$info['description']}" ?></td>
                    <td class="table_td"><img height="100px" width="100px"  class="teacher" src="<?php echo "{$info['image']}" ?>" alt=""></td>
                    <td class="table_td">
                    <?php
                    echo "<a class='btn btn-danger' onClick= \"javascript:return confirm('Are You Sure To Delete This')\" href='admin_view_teacher.php?teacher_id={$info['id']}'>Delete</a>";
                    ?> 
                    </td>
                    <td class="table_td">
                    <?php
                    echo "<a class='btn btn-primary' href='admin_update_teacher.php?teacher_id={$info['id']}'>Update</a>";
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