<?php
    include('includes/connection.php');
    if(isset($_POST['userRegistration'])){
        if ($_POST['password'] === $_POST['confirm_password']) {
            $query = "INSERT INTO users VALUES(null, '$_POST[name]', '$_POST[email]', '$_POST[password]', $_POST[mobile] )";
            $query_run = mysqli_query($connection, $query);

            if($query_run){
                echo "<script type='text/javascript'>
                        alert('User Registered Successfully!');
                        window.location.href = 'index.php';
                    </script>";
            }else{
                echo "<script type='text/javascript'>
                        alert('Error! Please try again!');
                        window.location.href = 'registration.php';
                    </script>";
            }
        } else {
            echo "<script type='text/javascript'>
                    alert('Passwords do not match!');
                    window.location.href = 'registration.php';
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskWorks | Student Registration page</title>

    <!-- JQUERY file -->
    <script src="includes/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap file -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.min.js"></script>

    <!-- CSS file -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .form-control.invalid {
            border-color: red;
        }
    </style>
</head>
<body id="registration">
    <section>
        <h1 id="logintitle">TaskWorks</h1>
        <h5 id="loginsubhead">Where tasks work for you</h5>
    </section>
    <div class="row">
        <div class="col-md-3" id="register-home-page">
            <center><h3 style="margin-bottom: 20px;">Student registration</h3></center>
            <hr>
            <form action="" method="post" id="registrationForm">
                <div class="form-group">
                    <input type="name" name="name" class="form-control" placeholder="Enter Name" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                        <span class="input-group-text">
                            <i class="fa fa-eye" id="toggleConfirmPassword" style="cursor: pointer;"></i>
                        </span>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile No." required>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" name="userRegistration" value="Register" class="btn" style="margin-left:20px; background-color:#EDB5BF; font-weight: bold;" required>
                    <a href="./index.php" class="btn" style="margin-left:20px; background-color:#EDB5BF; font-weight: bold;">Go back</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const password = document.getElementById('password');
            const confirm_password = document.getElementById('confirm_password');
            const mobile = document.getElementById('mobile');
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const form = document.getElementById('registrationForm');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });

            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirm_password.getAttribute('type') === 'password' ? 'text' : 'password';
                confirm_password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });

            confirm_password.addEventListener('input', () => {
                if (confirm_password.value !== password.value) {
                    confirm_password.classList.add('invalid');
                    mobile.disabled = true;
                } else {
                    confirm_password.classList.remove('invalid');
                    mobile.disabled = false;
                }
            });

            form.addEventListener('submit', (e) => {
                if (password.value !== confirm_password.value) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                }
            });
        });
    </script>
</body>
</html>
