<?php
error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}

include 'db.php';


$sql = "select * from `teacher`";

$result = mysqli_query($data, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0c6139bd6a.js" crossorigin="anonymous"></script>
    <title>Student Management System</title>
    <link rel="shortcut icon" href="./project_image/school.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .input_deg {
            padding-left: 10px;
        }

        .input_txt {
            padding-top: 10px;
            padding-left: 20px;
        }

        /* ... Your existing CSS ... */

        /* New footer styles */
        .new-footer {
            background-color: #2c3e50;
            /* Background color */
            height: 300px;
            /* Set the height to 300px */
            padding: 20px;
            /* Add some padding inside the footer */
            color: #ecf0f1;
            /* Text color */
            font-family: Arial, sans-serif;
            /* Font family */
            text-align: center;
            /* Center the text */
        }

        .new-footer .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .new-footer .footer-text {
            font-size: 1.5rem;
        }

        .new-footer .social-media {
            text-align: right;
        }

        .new-footer .social-link {
            margin-right: 10px;
            text-decoration: none;
            color: #ecf0f1;
            /* Icon color */
            font-size: 1.8rem;
            /* Icon size */
            transition: color 0.3s;
        }

        .new-footer .social-link:hover {
            color: #3498db;
            /* Icon color on hover */
        }

        /* ... Your existing CSS ... */
    </style>
</head>

<body>

    <nav>
        <label class="logo">W-School</label>
        <ul>
            <li><a href="#top">Home</a></li>
            <li><a href="#foot">Contact</a></li>
            <li><a href="#bottom">Admission</a></li>
            <li><a href="./login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>

    <div class="section-1" id="top">
        <label class="img-text"> We Teach Students With Care</label>
        <img class="main-img" src="./project_image/school_management.jpg" alt="">
    </div>

    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <img class="welcome-img" src="./project_image/school2.jpg" alt="">
            </div>

            <div class="col-md-8">
                <h1>Welcome to W-School</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora quia ipsam id maxime, exercitationem
                    molestiae ab at repudiandae impedit nulla corrupti aspernatur reprehenderit saepe iusto error? Illum
                    quia assumenda dolorem porro iusto animi. Facilis aut eligendi numquam ducimus fugiat saepe quaerat
                    quas consequuntur officiis, vero autem omnis aperiam nemo in tenetur atque, blanditiis sed harum
                    unde quasi exercitationem laborum? Obcaecati, aut? Dicta atque, incidunt nesciunt placeat
                    dignissimos quia minus provident tempora iste molestiae pariatur sunt perferendis non distinctio
                    animi perspiciatis nostrum, officiis saepe recusandae quasi fugiat cum hic. Earum perferendis nam
                    sint illo accusantium hic molestiae tempore magni beatae corporis!</p>
            </div>

        </div>

    </div>

    <div style="text-align: center;">
        <h1>Our Teachers</h1>
    </div>

    <div class="container">
        <div class="row">
            <?php
            while ($info = $result->fetch_assoc()) {
                ?>
            <div class="col-md-4">
                <img class="teacher" src="<?php echo " {$info['image']}" ?>" alt="">
                <h3>
                    <?php echo "{$info['name']}" ?>
                </h3>
                <h5>
                    <?php echo "{$info['description']}" ?>
                </h5>
            </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div style="text-align: center;">
        <h1>Our Courses</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="./project_image/web.jpg" alt="">
                <h3>Web Development</h3>

            </div>
            <div class="col-md-4">
                <img class="teacher" src="./project_image/graphic.jpg" alt="">
                <h3>Graphic Designer</h3>

            </div>
            <div class="col-md-4" id="bottom">
                <img class="teacher" src="./project_image/marketing.png" alt="">
                <h3>Marketing</h3>

            </div>
        </div>
    </div>

    <div style="text-align: center;">
        <h1>Admission Form</h1>
    </div>

    <div class="admission-form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text" for="">Name</label>
                <input class="input_deg" type="text" name="name">
            </div>
            <div class="adm_int">
                <label class="label_text" for="">E-mail</label>
                <input class="input_deg" type="text" name="email">
            </div>
            <div class="adm_int">
                <label class="label_text" for="">Phone</label>
                <input class="input_deg" type="text" name="phone">
            </div>
            <div class="adm_int">
                <label class="label_text" for="">Message</label>
                <textarea id="" cols="30" rows="10" class="input_txt" name="message"></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" type="submit" id="submit" value="Apply" name="apply">
            </div>
        </form>
    </div>
    <!-- ... Your existing code ... -->

    <footer class="new-footer" id="foot">
        <div class="footer-container">
            <div class="footer-content">
                <h4 class="footer-text">All rights reserved by Wasif Hussain</h4>
            </div>
            <div class="social-media">
                <a href="https://www.instagram.com/iamwh_01/" target="_blank" class="social-link">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.facebook.com/wasif.hussain.165033" target="_blank" class="social-link">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.linkedin.com/in/787wasifhussain/" target="_blank" class="social-link">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://github.com/Wasif0787" target="_blank" class="social-link">
                    <i class="fab fa-github"></i>
                </a>
            </div>
        </div>
    </footer>

    <!-- ... Rest of your code ... -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const links = document.querySelectorAll('a[href^="#"]');

            links.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();

                    const targetId = this.getAttribute('href').substring(1); // Remove the '#'
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        const offsetTop = targetElement.getBoundingClientRect().top;
                        const scrollOptions = {
                            behavior: 'smooth',
                        };

                        window.scrollTo({
                            top: offsetTop + window.scrollY,
                            ...scrollOptions,
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>