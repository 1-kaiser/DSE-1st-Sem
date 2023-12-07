<?php
    // Connection to Database
    $conn = mysqli_connect('localhost', 'root', '', 'dito');

    if (mysqli_connect_error()) {
        echo 'error';
    }

    // Input Validation
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Redirect
    function redirect($location) {
        header("Location: $location");
        return $location;
    }
?>

