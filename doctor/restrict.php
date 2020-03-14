<?php

    session_start();
    if (isset($_SESSION['email']) and isset($_SESSION['type_of_user']) and $_SESSION['type_of_user'] == "doctor") {
    } else {
        header('Location: ' . 'login.php');
    }

?>