<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Patient</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<?php
require('./restrict.php');

require('../config/db_con.php');

if(isset($_POST['create'])){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $bloodGroup = $_POST['bloodGroup'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $info = $_POST['info'];



    $sql = "INSERT INTO patients(name,phone,email,height,weight,bloodgroup,dob,gender,info) VALUES('$name',$phone,'$email',$height,$weight,'$bloodGroup','$dob',$gender,'$info')";

    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['success'] = "Patient created and their id is <b>".mysqli_insert_id($conn)."</b>";
        header('Location: '.'index.php');
    }

}


?>

<body style="height: 100vh" class="container pt-5">
    <?php
    if (isset($result)) {
        echo '<p class="alert alert-danger">Unable to create a doctor</p>';
    }
    ?>
    <div class="card mt-2">
        <h3 class="card-header">Create Patient</h3>

        <form class="p-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="phone">Phone </label>
                        <input type="text" name="phone" class="form-control" id="phone" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="text" name="email" class="form-control" id="email" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="height">Height ( cm ) : </label>
                        <input type="text" name="height" class="form-control" id="height" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="weight">Weight ( kg ) :</label>
                        <input type="text" name="weight" class="form-control" id="weight" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="bloodGroup">Blood Group :</label>
                        <input type="text" name="bloodGroup" class="form-control" id="bloodGroup" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="dob">DOB :</label>
                        <input type="text" name="dob" class="form-control" id="dob" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="gender">Gender : </label>
                        <select class="form-control" name="gender" id="gender">
                            <option value='0'>Male</option>
                            <option value='1'>Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="info">Allergic to / other info:</label>
                <input type="text" name="info" class="form-control" id="info" required>
            </div>

            <button type="submit" name="create" class="btn btn-primary">CREATE</button>
        </form>

    </div>


</body>

</html>