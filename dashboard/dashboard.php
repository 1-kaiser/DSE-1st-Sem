<?php
require('../reusable.php');
session_start();

    // echo 'Your id: ' .$_SESSION['username'];

    // toClientRequestList();
    // toClientHistory(); 
    // toPackagesList();
    // toDeliveryStatus();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DITO | Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

    <div class="sidebar">
        <img src="../css/dito.png" class="imgDito"> <br />
        <span class="admin-text">Admin</span> <hr style="color: white;"/>
        <div class="links">
            <a href="#" class="link">Home</a>
            <a href="#" class="link">Create Account</a>
        </div>

        <form action="logout.php" method="POST">
            <a href="./logout.php" class="logout-text">Logout</a>
        </form>
    </div>

    <div class="greet-msg">
        <span class="greet">Dashboard</span>
        <a href="" class="manage">
        <span>Manage Your Account</span>
        </a>
    </div>

    <div class="forms-wrapper">
        <div class="forms-container">
            <a href="./Client Request List/clientRequestList.php" class="button">
            <button name="clientRequestList" class="btn" 
            style="background-color: #fd647f; 
            border: transparent; 
            color: white; 
            font-family: monospace;">
            Client Request List</button>
            </a>

            <a href="./Client History/clientHIstory.php" class="button">
            <button name="clientHistory" class="btn" 
            style="border: transparent;
            background-color: #91d327;
            color: white;
            font-family: monospace;">Client History</button>
            </a>
            
            <a href="./Packages List/packagesList.php" class="button">
            <button name="packagesList" class="btn" 
            style="border: transparent;
            background-color: #d31fcd;
            color: white;
            font-family: monospace;">Packages List</button>
            </a>
            
            <a href="./Delivery Status/deliveryStatus.php" class="button">
            <button name="deliveryStatus" class="btn" 
            style="border: transparent;
            background-color: #22bda0;
            color: white;
            font-family: monospace;">Delivery Status</button>
            </a>

            
        </div>
    </div>
    
</body>

</html>