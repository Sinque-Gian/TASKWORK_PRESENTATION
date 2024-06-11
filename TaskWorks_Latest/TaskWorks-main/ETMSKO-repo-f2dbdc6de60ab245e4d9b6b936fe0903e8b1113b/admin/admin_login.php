<?php
    include('../includes/connection.php');
    if(isset($_POST['adminLogin'])){
        $query = "SELECT email,password,name, id FROM admin WHERE email = '$_POST[email]' AND password = '$_POST[password]'";

        $query_run = mysqli_query($connection, $query);

        if(mysqli_num_rows($query_run)){
            echo "<script type='text/javascript'>                    
                    window.location.href = 'admin_dashboard.php';
                </script>";

        }else{
            echo "<script type='text/javascript'>
                    alert('Wrong Credentials!');
                    window.location.href = 'admin_login.php';
                </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taskworks | Admin login</title>

    <!-- JQUERY file -->
    <script src="../includes/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap file -->
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.js">

    <!-- CSS file -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body id="admin_login">
<section>
        <h1 id="logintitle">TaskWorks</h1>
        <h5 id="loginsubhead">Where tasks work for you</h5>
    </section>
    <div class="row">
        <div class="col-md-3" id="login-home-page">
            <center><h3 style="margin-bottom: 20px;">Teacher login</h3></center>
            <hr>
            <form action="" method="post">
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
                    <input type="submit" name="adminLogin" value="Login" class="btn" style="margin-left:20px; background-color:#EDB5BF; font-weight: bold;" required>
                    <a href="../index.php" class="btn" style="margin-left:20px; background-color:#EDB5BF; font-weight: bold;">Go back</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const password = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');

            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>
</html>
