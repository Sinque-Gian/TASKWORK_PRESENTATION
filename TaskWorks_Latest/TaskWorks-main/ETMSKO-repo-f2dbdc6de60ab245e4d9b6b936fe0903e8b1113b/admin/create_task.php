<?php
include('../includes/connection.php');

if(isset($_POST['create_task'])){
    $user_id = $_POST['user_id'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "INSERT INTO tasks (user_id, description, start_date, end_date, status) 
              VALUES ('$user_id', '$description', '$start_date', '$end_date', 'Not started')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        echo "<script type='text/javascript'>            
                alert('Task created successfully!');        
                window.location.href = 'admin_dashboard.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>            
                alert('Error Please try again!');        
                window.location.href = 'admin_dashboard.php';
            </script>";
    }
}
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
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.js">

    <!-- CSS file -->
    <link rel="stylesheet" href="../css/style.css">
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
                    <b>Email: </b> Test@gmail.com
                    <span style="margin-left: 25px;"><b>Name: </b>Test admin </span>
                </div>            
        </div>
    </div>
    </section>
    <section id="header2">
        <div class="container">
            <div class="row justify-content-between">
                <nav class="col-12">
                    <a href="../admin/admin_dashboard.php">Dashboard</a>
                    <a href="manage_task.php">Create Task</a>
                    <a href="index.php">Log out</a>
                </nav>
            </div>
        </div>
    </section>
    <!-- Header ends here -->
    <section id="dashbody">
        <h1 id="title">Create Task</h1>
        <!-- <h5 id="subhead">Where tasks works for you</h5> -->

        <div class="row justify-content-center">
            <div class="col-md-6">
            <form action="create_task.php" method="post">
    <div class="form-group">
        <label for="">Select Student</label>
        <select name="user_id" id="" class="form-control">
            <option value="">-Select-</option>  
            <?php
                include('../includes/connection.php');
                $query = "SELECT sid, name FROM users";
                $query_run = mysqli_query($connection, $query);
                if(mysqli_num_rows($query_run)){
                    while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <option value="<?php echo $row['sid']; ?>"><?php echo $row["name"]; ?></option>
                    <?php
                    }
                }                       
            ?>
        </select>
    </div>
        <div class="form-group">
            <label for="">Description: </label>
            <textarea name="description" id="" class="form-control" rows="3" cols="50" placeholder="Mention the task"></textarea>
         </div>
     <div class="form-group">
        <label for="">Start date: </label>
        <input type="date" name="start_date" id="" class="form-control"></input>
     </div>
    <div class="form-group">
        <label for="">End date: </label>
        <input type="date" name="end_date" id="" class="form-control"></input>
    </div>
    <input type="submit" class="mt-4 btn btn-warning" name="create_task" value="Create">
    </form>

            </div>
        </div>
    </section>
    </div>
</body>
</html>
