<?php
require('../reusable.php');
session_start();

    echo 'Your id: ' .$_SESSION['username'];

    toClientRequestList();
    toClientHistory(); 
    toPackagesList();
    toDeliveryStatus();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DITO | Dashboard</title>

    <form action="" method="POST">
    <button name="clientRequestList">Client Request List</button>
    </form>

    <form action="" method="POST">
    <button name="clientHistory">Client History</button>
    </form>

    <form action="" method="POST">
    <button name="packagesList">Packages List</button>
    </form>
    
    <form action="" method="POST">
    <button name="deliveryStatus">Delivery Status</button>
    </form>

    <form action="logout.php" method="POST">
        <input type="submit" name="logout-submit" value="Logout">
    </form>
</head>
<body>
    
</body>
</html>