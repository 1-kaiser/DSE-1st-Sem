<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Success</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/requestSuccess.css">
</head>
<body>
    <div class="homepage-wrapper">
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #115e31;">
            <div class="container" >
                <a class="navbar-brand" href="#">
                    <img src="../css/dito.png" style="border-radius: 50%; width: 1.5rem;">
                    <span class="home">DITO LMISCITNA</span></a>
                <!-- <a class="navbar-brand " href="#request">
                    <span class="goToRequest">Go to Request Page</span></a> -->
            </div>
        </nav>
    </div>

    <div class="request-wrapper" id="request">
            <strong class="requestSuccessTitle">Your request sent successfully.</strong>
            <p>Please wait for the confirmation.</p>
            <img src="../css/icons8-success.gif" class="mb-3">
            <a href="./clientSide.php"><button class="btn btn-primary">Make a new request</button></a>    
    </div>
</body>
</html>