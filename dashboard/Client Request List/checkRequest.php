<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Request List</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/clientRequestList.css">
</head>
<body>

    <div class="sidebar">
        <img src="../../css/dito.png" class="imgDito"> <br />
        <span class="admin-text">Admin</span> <hr style="color: white;"/>
        <div class="links">
        <a href="../dashboard.php" class="link">
                <img src="../../css/icons/icons8-home-50.png" class="icons">
            Home</a>
            <a href="../Client Request List/clientRequestList.php" class="link">
                <img src="../../css/icons/icons8-request-50.png" class="icons">
            Client Request List</a>
            <a href="../Client History/clientHIstory.php" class="link">
                <img src="../../css/icons/icons8-history-50.png" class="icons">
            Client History</a>
            <!-- <a href="../Packages List/packagesList.php" class="link">
                <img src="../../css/icons/icons8-package-50.png" class="icons">
            Packages List</a>
            <a href="../Delivery Status/deliveryStatus.php" class="link">
                <img src="../../css/icons/icons8-shipped-50.png" class="icons">
            Delivery Status</a> -->
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Client Request List</span>
        <!-- <a href="" class="manage">
        <span>Manage Your Account</span>
        </a> -->
    </div>

    <?php
    require('../../reusable.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM clientrequestlist WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="checkRequest-wrapper">
    
    <form method="POST" style="width: 40rem;">
        <div class="mb-3">
            <label class="checkForm">Name</label>
            <div><strong><?php echo $row['name'];?></strong></div>
        </div>
        <div class="mb-3">
            <label class="checkForm">Email address</label>
            <div><strong><?php echo $row['email'];?></strong></div>
        </div>
        <div class="mb-3">
            <label class="checkForm">Contact Number</label>
            <div><strong><?php echo $row['contact'];?></strong></div>
        </div>
        <div class="mb-3">
            <label class="checkForm">Request</label>
            <div><strong><?php echo $row['request'];?></strong></div>
        </div>
        <a href="./makeForm.php?id=<?php echo $row['id'];?>" class="btn btn-primary float-end" target="_blank">Make a form</a>
    </form>

    </div>
    
</body>
</html>