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
            <a href="#" class="link">
                <img src="../css/icons/icons8-home-50.png" class="icons">
            Home</a>
            <a href="./Client Request List/clientRequestList.php" class="link">
                <img src="../css/icons/icons8-request-50.png" class="icons">
            Client Request List</a>
            <a href="./Client History/clientHIstory.php" class="link">
                <img src="../css/icons/icons8-history-50.png" class="icons">
            Client History</a>
            <a href="./Packages List/packagesList.php" class="link">
                <img src="../css/icons/icons8-package-50.png" class="icons">
            Packages List</a>
            <a href="./Delivery Status/deliveryStatus.php" class="link">
                <img src="../css/icons/icons8-shipped-50.png" class="icons">
            Delivery Status</a>
        </div>

        <form action="logout.php" method="POST">
            <a href="./logout.php" class="logout-text">
                <img src="../css/icons/icons8-logout-50.png" class="icons">
            Logout</a>
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
            <div class="card">
                <p class="clientTitle">Total Client <br /> Request</p>
                <?php
                $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                $result = mysqli_query($conn, $query);
                $total = mysqli_fetch_assoc($result);
                $totalRows = $total['total_rows'];
                ?>

                <p class="total"> <?php echo $totalRows ?> </p>

            </div>  

            <div class="card" style="background-color: #D4F673;">
                <p class="clientTitle">Total Packages/ <br /> Parcels List</p>
                <?php
                $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                $result = mysqli_query($conn, $query);
                $total = mysqli_fetch_assoc($result);
                $totalRows = $total['total_rows'];
                ?>

                <p class="total"> <?php echo $totalRows ?> </p>
                
            </div> 

            <div class="card" style="background-color: #D39AFF;">
                <p class="clientTitle">Total Clients</p>
                <?php
                $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                $result = mysqli_query($conn, $query);
                $total = mysqli_fetch_assoc($result);
                $totalRows = $total['total_rows'];
                ?>

                <p style="margin: 2rem 0 1rem 14.5rem;
                        font-size: 20px;"> <?php echo $totalRows ?> </p>
                
            </div> 

            <div class="card" style="background-color: #61E840;">
                <p class="clientTitle">Total Deliveries</p>
                <?php
                // $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                // $result = mysqli_query($conn, $query);
                // $total = mysqli_fetch_assoc($result);
                // $totalRows = $total['total_rows'];
                ?>

                <p style="margin: 2rem 0 1rem 14.5rem;
                        font-size: 20px;"></p>
                
            </div> 
        </div>
    </div>
    
</body>

</html>