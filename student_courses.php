<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} else if ($_SESSION['usertype'] == 'admin') { // Remove the extra space here
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <style>
    .content{
        margin-left: 25%;
        margin-top: 5%;
    }
    .list{
        width: 600px;
        margin-top: 50px;
    }
  </style>
</head>

<body> 

  <?php
  include 'student_sidebar.php';
  ?>
<div class="content">
    <h1>Available Courses</h1>
    <div class="list-group available-courses-list list">
        <a href="#" class="list-group-item list-group-item-action available-course-item">
            <div class="course-details">
                <h3 class="course-title">Web Development</h3>
                <p class="course-description">Learn the art of building modern websites.</p>
            </div>
            <!-- <button class="btn btn-primary add-course-btn">Add</button> -->
        </a>
        <a href="#" class="list-group-item list-group-item-action available-course-item">
            <div class="course-details">
                <h3 class="course-title">Android Development</h3>
                <p class="course-description">Create amazing Android apps from scratch.</p>
            </div>
            <!-- <button class="btn btn-primary add-course-btn">Add</button> -->
        </a>
        <a href="#" class="list-group-item list-group-item-action available-course-item">
            <div class="course-details">
                <h3 class="course-title">Blockchain Basics</h3>
                <p class="course-description">Discover the fundamentals of blockchain technology.</p>
            </div>
            <!-- <button class="btn btn-primary add-course-btn">Add</button> -->
        </a>
        <a href="#" class="list-group-item list-group-item-action available-course-item">
            <div class="course-details">
                <h3 class="course-title">Data Structures and Algorithms</h3>
                <p class="course-description">Master algorithms and data structures for programming.</p>
            </div>
            <!-- <button class="btn btn-primary add-course-btn">Add</button> -->
        </a>
        <!-- Add more courses here -->
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>