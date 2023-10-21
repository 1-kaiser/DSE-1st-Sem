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
            <a href="#" class="link">
                <img src="../../css/icons/icons8-request-50.png" class="icons">
            Client Request List</a>
            <a href="./Client History/clientHIstory.php" class="link">
                <img src="../../css/icons/icons8-history-50.png" class="icons">
            Client History</a>
            <a href="./Packages List/packagesList.php" class="link">
                <img src="../../css/icons/icons8-package-50.png" class="icons">
            Packages List</a>
            <a href="./Delivery Status/deliveryStatus.php" class="link">
                <img src="../../css/icons/icons8-shipped-50.png" class="icons">
            Delivery Status</a>
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Client Request List</span>
        <a href="" class="manage">
        <span>Manage Your Account</span>
        </a>
    </div>

    <div class="clientRequestList-wrapper">

    <table class="table table-hover w-75" style="margin-left: 8rem;">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                require('../../reusable.php');

                $query = "SELECT * FROM clientrequestlist";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['contact'];?></td>
                            <td>
                                <a href="./checkRequest.php?id=<?php echo $row['id'];?>"><button class="btn btn-primary">Check</button></a>
                            </td>
                        </tr>
                    <?php
                }
            
            ?>
            
        </tbody>
    </table>

    </div>
    
</body>
</html>