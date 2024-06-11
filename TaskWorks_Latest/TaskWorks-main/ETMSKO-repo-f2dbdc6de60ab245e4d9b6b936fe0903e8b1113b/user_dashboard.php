<?php
    session_start(); // Start the session
    if(!isset($_SESSION['email']) || !isset($_SESSION['name'])){
        // Redirect to login if session variables are not set
        header("Location: user_login.php");
        exit();
    }
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskWorks | User dashboard</title>

    <!-- JQUERY file -->
    <script src="includes/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap file -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.js">

    <!-- CSS file -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body id="user_dashboard">
    <!-- Header  -->
    <section>
    <div class="row" id="header">
        <div class="col-md-12" >
            <div class="col-md-4" style="display: inline-block;">
                <h3 class="text-white">TaskWorks</h3>
                </div>
                <div class="col-md-6" style="display: inline-block;text-align: right;">
                    <b>Email: </b> <?php echo $email; ?>
                    <span style="margin-left: 25px;"><b>Name: </b><?php echo $name; ?> </span>
                </div>            
        </div>
    </div>
    </section>
    <section id="header2">
        <div class="container">
            <div class="row justify-content-between">
                <nav class="col-12">
                    <a href="user_dashboard.php">Dashboard</a>
                    <a href="manage_task.php">Task</a>
                    <a href="index.php">Log out</a>
                </nav>
            </div>
        </div>
    </section>
    <!-- Header ends here -->
    <section id="dashbody">
        <h1 id="title">TaskWorks</h1>
        <h5 id="subhead">Where tasks works for you</h5>
    </section>
    </div>
</body>
</html>
