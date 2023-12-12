<?php
include('../../reusable.php');

    if (isset($_POST['delivery_id'])) {
        $id = $_POST['delivery_id'];

        $result = mysqli_query($conn, "SELECT * FROM delivered WHERE delivery_id = '$id'");
        $row = mysqli_fetch_assoc($result);
        print_r($row);
    }
?>