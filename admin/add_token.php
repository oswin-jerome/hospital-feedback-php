<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Token</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />




    <!-- Latest compiled and minified JavaScript -->
</head>
<?php
require('./restrict.php');

require('../config/db_con.php');


// read patients

$sqlPatients = "select * from patients";
$patients = mysqli_query($conn, $sqlPatients);

$sqlDoc = "select * from doctors";
$doctors = mysqli_query($conn, $sqlDoc);


if(isset($_POST['create'])){

    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $temprature = $_POST['temprature'];
    $checkin = $_POST['checkin'];
    $problem = $_POST['problem'];



    $sql = "INSERT INTO tokens(patient,doctor,temprature,checkin,problem) VALUES($patient,$doctor,$temprature,'$checkin','$problem')";

    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success'] = "Token created";
        header('Location: '.'index.php');
    }

}


?>

<body style="height: 100vh" class="container pt-5">
    <?php
    date_default_timezone_set("Asia/Kolkata");
    if (isset($result)) {
        echo '<p class="alert alert-danger">Unable to create a doctor</p>';
    }
    ?>

    <div class="card mt-2">
        <h3 class="card-header">Add Token</h3>

        <form class="p-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <div class="form-group">
                <label for="patient">Patient</label>
                <select class="selectpicker form-control" id="patient" name="patient" data-live-search="true">
                    <?php

                    if (mysqli_num_rows($patients) > 0) {

                        while ($patient = mysqli_fetch_assoc($patients)) {
                            echo ("<option value=" . $patient['id'] . ">" . $patient['id'] . " -> " . $patient['name'] . "</option>");
                        }
                    } else {
                        echo ('');
                    }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="doctor">Doctor</label>
                <select class="selectpicker form-control" id="doctor" name="doctor" data-live-search="true">
                    <?php

                    if (mysqli_num_rows($doctors) > 0) {

                        while ($doctor = mysqli_fetch_assoc($doctors)) {
                            echo ("<option value=" . $doctor['id'] . ">" . $doctor['id'] . " -> " . $doctor['name'] . "</option>");
                        }
                    } else {
                        echo ('');
                    }

                    ?>
                </select>
            </div>




            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="temprature">Temprature ( F ): </label>
                        <input type="text" name="temprature" class="form-control" id="temprature" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="checkin">Time of checkin :</label>
                        <input type="text" name="checkin" class="form-control" id="checkin" required value="<?php echo date("d/m/Y h:i a"); ?>">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <label for="problem">Problem :</label>
                <input type="text" name="problem" class="form-control" id="problem" required>
            </div>

            <button type="submit" name="create" class="btn btn-primary">CREATE</button>
        </form>

    </div>

    <script defer>
        $(document).ready(() => {
            // alert(0)
        })
        $('.selectpicker').selectpicker();
    </script>
</body>

</html>