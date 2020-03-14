<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attend patients</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<?php
require('./restrict.php');
require('../config/db_con.php');

$docId = $_SESSION['docId'];
// echo($docId);
$sqlGetToken = "SELECT p.name as pname, d.name as dname,t.id as tokenId,
    t.temprature as temp, t.checkin as checkin,t.problem as problem,
    p.gender as gender,p.height as height,p.weight as weight,p.dob as dob,p.bloodgroup as bg,
    p.phone as phone,p.email as email,p.info as info
FROM tokens t inner join doctors d on d.id = t.doctor inner join patients p on p.id = t.patient WHERE t.doctor = $docId and t.closed = 0 LIMIT 1";
$re = mysqli_query($conn, $sqlGetToken);

$patient = mysqli_fetch_assoc($re);
print_r($patient);

if (mysqli_num_rows($re) > 0) {
} else {
    $_SESSION['success'] = "No pending patients";
    header('Location: '.'index.php');
}


if (isset($_POST['create'])) {

    $patient = $_POST['patient'];
    $doctor = $_POST['doctor'];
    $temprature = $_POST['temprature'];
    $checkin = $_POST['checkin'];
    $problem = $_POST['problem'];
    $medicine = $_POST['medicine'];
    $feedback = $_POST['feedback'];
    $checkout = $_POST['checkout'];
    $tokenId = $_POST['tokenId'];



    $sql = "UPDATE tokens SET problem='$problem', medicine='$medicine', feedback='$feedback', checkout = '$checkout', closed= 1 WHERE id = $tokenId ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['success'] = "";
        header('Location: ' . $_SERVER['REQUEST_URI']);
    }
}


?>

<body>

    <?php
    date_default_timezone_set("Asia/Kolkata");
    if (isset($result)) {
        echo '<p class="alert alert-danger">Unable to create a doctor</p>';
    }
    ?>

    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand">Doctor panel</a>
        <div class="inline">
            <!-- <a href="./create_doctor.php" class="btn btn-success">Attend patients</a> -->
        </div>
    </nav>


    <div class="container">
        <form class="p-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="text" name="tokenId" value="<?php echo $patient['tokenId'] ?>" hidden>
            <div class="form-group">
                <label for="patient">Patient</label>
                <input type="text" name="patient" class="form-control" id="patient" required value="<?php echo $patient['pname'] ?>">

            </div>

            <div class="form-group">
                <label for="doctor">Doctor</label>
                <input type="text" name="doctor" class="form-control" id="doctor" required value="<?php echo $patient['dname'] ?>">
            </div>

            <div class="card  mt-3 mb-3">
                <p class="card-header">df</p>
                <div class="row p-3">
                    <div class="col form-group">
                        <label for="dummy">Gender</label>
                        <input type="text" name="dummy" class="form-control" id="dummy" required readonly value="<?php echo $patient['gender'] == 0 ? "Male" : "Female" ?>">
                    </div>
                    <div class="col form-group">
                        <label for="dummy1">Height (cm)</label>
                        <input type="text" name="dummy1" class="form-control" id="dummy1" required readonly value="<?php echo $patient['height'] ?>">
                    </div>
                    <div class="col form-group">
                        <label for="dummy1">Weight (kg)</label>
                        <input type="text" name="dummy1" class="form-control" id="dummy1" required readonly value="<?php echo $patient['weight'] ?>">
                    </div>
                    <div class="col form-group">
                        <label for="dummy1">Blood group</label>
                        <input type="text" name="dummy1" class="form-control" id="dummy1" required readonly value="<?php echo $patient['bg'] ?>">
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col form-group">
                        <label for="dummy">Date of birth</label>
                        <input type="text" name="dummy" class="form-control" id="dummy" required readonly value="<?php echo $patient['dob'] ?>">
                    </div>
                    <div class="col form-group">
                        <label for="dummy1">Phone</label>
                        <input type="text" name="dummy1" class="form-control" id="dummy1" required readonly value="<?php echo $patient['phone'] ?>">
                    </div>
                    <div class="col form-group">
                        <label for="dummy1">Email </label>
                        <input type="text" name="dummy1" class="form-control" id="dummy1" required readonly value="<?php echo $patient['email'] ?>">
                    </div>
                </div>
                <div class="col form-group">
                    <label for="dummy1">Info </label>
                    <input type="text" name="dummy1" class="form-control" id="dummy1" required readonly value="<?php echo $patient['info'] ?>">
                </div>
            </div>


            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="temprature">Temprature ( F ): </label>
                        <input type="text" name="temprature" class="form-control" id="temprature" required value="<?php echo $patient['temp'] ?>">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="checkin">Time of checkin :</label>
                        <input type="text" name="checkin" class="form-control" id="checkin" required value="<?php echo $patient['checkin'] ?>">
                    </div>
                </div>
            </div>



            <div class="form-group">
                <label for="problem">Problem :</label>
                <textarea type="text" name="problem" class="form-control" id="problem" required><?php echo $patient['problem'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="medicine">Medicine :</label>
                <textarea type="text" name="medicine" class="form-control" id="medicine" required></textarea>
            </div>
            <div class="form-group">
                <label for="feedback">Feedback :</label>
                <textarea type="text" name="feedback" class="form-control" id="feedback" required></textarea>
            </div>
            <input type="text" hidden value="<?php echo date("d/m/Y h:i a"); ?>" name="checkout" />

            <button type="submit" name="create" class="btn btn-primary">Done</button>
        </form>
    </div>


</body>

</html>