<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<!-- Login logic -->
<?php
session_start();
require('../config/db_con.php');
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['dob'];

    $sql = "SELECT * FROM patients WHERE email='$email' AND dob='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Logged in
        $_SESSION['email'] = $email;
        $_SESSION['patId'] = mysqli_fetch_assoc($result)['id'];
        $_SESSION['type_of_user'] = "patient";
        header('Location: '.'index.php');
    } else {
        // Incorrect cred
        $cred = true;

    }
}

?>

<body style="height: 100vh" class="container pt-5">


    <?php

    if (isset($cred)) {
        echo '<p class="alert alert-danger">Invalid login detials</p>';
    }

    ?>


    <div class="card mt-2">
        <h3 class="card-header">Admin Login</h3>
        <form class="p-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="passwd">Date of birth</label>
                <input type="text" name="dob" class="form-control" id="passwd">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
    </div>





</body>

</html>