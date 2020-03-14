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
require('../config/db_con.php');
$patId = $_SESSION['patId'];

$sql = "SELECT t.problem as problem,d.name as dname,t.temprature as temp,t.medicine as med, t.feedback as feedback, t.checkin as checkin FROM tokens t  inner join doctors d on t.doctor = d.id WHERE patient = $patId";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
// print_r($result);
?>

<body>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Patient panel</a>

        <div class="inline">
            <!-- <a href="./create_doctor.php" class="btn btn-success">Create Doctor</a>
            <a href="./create_patient.php" class="btn btn-primary">Create Patient</a> -->
        </div>
    </nav>


    <div class=" container justify-content-center mt-5">
        <ul class="list-group">

            <?php
            if (mysqli_num_rows($result) > 0) {

                while($rec = mysqli_fetch_assoc($result)){
            ?>

                <li class="list-group-item m-2">
                    <div class="row align-items-center">
                        <h6 class="col-2 m-0 right-text ">Problem :</h6>
                        <p class="col-10 m-0"><?php echo($rec['problem']); ?></p>
                        <div class="mt-2 col-12"></div>
                        <h6 class="col-2 m-0 right-text ">Doctor :</h6>
                        <p class="col-10 m-0"><?php echo($rec['dname']); ?></p>
                        <div class="mt-2 col-12"></div>
                        <h6 class="col-2 m-0 right-text ">Temprature :</h6>
                        <p class="col-10 m-0"><?php echo($rec['temp']); ?></p>
                        <div class="mt-2 col-12"></div>
                        <h6 class="col-2 m-0 right-text ">Medicine :</h6>
                        <p class="col-10 m-0"><?php echo($rec['med']); ?></p>
                        <div class="mt-2 col-12"></div>
                        <h6 class="col-2 m-0 right-text ">Feedback :</h6>
                        <p class="col-10 m-0"><?php echo($rec['feedback']); ?></p>
                        <div class="mt-2 col-12"></div>
                        <h6 class="col-2 m-0 right-text ">Date :</h6>
                        <p class="col-10 m-0"><?php echo($rec['checkin']); ?></p>
                    </div>
                </li>

            <?
                }
            } else {
                echo ('<div class="alert alert-danger"> No record found</div>');
            }
            ?>
        </ul>
    </div>

    <?php
    if (isset($_SESSION['success'])) {
        echo '<p class="alert alert-success">' . $_SESSION['success'] . '</p>';
        unset($_SESSION["success"]);
    }
    ?>

</body>

</html>