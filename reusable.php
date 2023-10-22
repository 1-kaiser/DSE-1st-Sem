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

    // //Issets
    // function toClientRequestList() {
    //     if (isset($_POST['clientRequestList'])) {
    //         redirect('./Client Request List/clientRequestList.php');
    //     }
    // }
    // function toClientHistory() {
    //     if (isset($_POST['clientHistory'])) {
    //         redirect('./Client History/clientHIstory.php');
    //     }
    // }
    // function toPackagesList() {
    //     if (isset($_POST['packagesList'])) {
    //         redirect('./Packages List/packagesList.php');
    //     }
    // }
    // function toDeliveryStatus() {
    //     if (isset($_POST['deliveryStatus'])) {
    //         redirect('./Delivery Status/deliveryStatus.php');
    //     }
    // }


?>