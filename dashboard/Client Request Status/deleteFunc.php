<?php
require('../../reusable.php');
session_start();
        $id = $_GET['id'];
        $delRes = mysqli_query($conn, "DELETE FROM archive WHERE id = '$id'");
        header('Location: archive.php');
        $_SESSION['notif'] = $id;

?>