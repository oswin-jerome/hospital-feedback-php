<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Doctor</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<?php
    require('./restrict.php');

    require('../config/db_con.php');

    if(isset($_POST['create'])){

        $name = $_POST['name'];
        $qualification = $_POST['qualification'];
        $email = $_POST['email'];
        $password = $_POST['password'];



        $sql = "INSERT INTO doctors(name,qualification,email,password) VALUES('$name','$qualification','$email','$password')";

        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['success'] = "Doctor created";
            header('Location: '.'index.php');
        }

    }


?>
<body style="height: 100vh" class="container pt-5">
    <?php
        if(isset($result)){
            echo '<p class="alert alert-danger">Unable to create a doctor</p>';
        }
    ?>
    <div class="card mt-2">
        <h3 class="card-header">Create Doctor</h3>

        <form class="p-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="qualification">Qualification</label>
                <input type="text" name="qualification" class="form-control" id="qualification" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="passwd">Password</label>
                <input type="password" name="password" class="form-control" id="passwd" required>
            </div>
            <button type="submit" name="create" class="btn btn-primary">CREATE</button>
        </form>

    </div>


</body>

</html>