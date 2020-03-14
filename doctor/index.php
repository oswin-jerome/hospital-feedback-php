<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<?php
require('./restrict.php');
// session_destroy();
?>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Doctor panel</a>

        <div class="inline">
            <a href="./attend_patients.php" class="btn btn-success">Attend patients</a>
        </div>
    </nav>


    <div class="d-flex justify-content-center mt-5">
        <a href="./add_token.php" class="btn btn-info">New Token</a>
    </div>

    <?php
    if (isset($_SESSION['success'])) {
        echo '<p class="alert alert-success">' . $_SESSION['success'] . '</p>';
        unset($_SESSION["success"]);
    }
    ?>

</body>

</html>