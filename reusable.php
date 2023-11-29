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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>