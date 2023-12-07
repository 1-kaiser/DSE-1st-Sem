<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Status</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/deliveryButtons.css">
    <!-- Icons -->
    <link rel="stylesheet" href="../../css/bootstrap-icons-1.11.1/bootstrap-icons.min.css">

</head>
<body>

    <div class="sidebar">
        <img src="../../css/dito.png" class="imgDito"> <br />
        <span class="admin-text">Admin</span> 
        <hr style="color: white;"/>
        <div class="links">

            <a href="../dashboard.php" class="link">
            <i class="bi bi-house-door-fill fs-5 text-white"></i>
            Home</a>

            <a href="../Client Request List/clientRequestList.php" class="link">
            <i class="bi bi-question-octagon fs-5 text-white"></i>
            Client Request List</a>

            <a href="../Client Request Status/clientRequestStatus.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client Request Status</a>

            <a href="./deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <a href="../Client Request Status/acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="../Client Request Status/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>

        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Delivery Status</span>
        <!-- Dropdown -->
        <div class="dropdown" style="margin-right: 18px;">
            <a class="btn btn-warning dropdown-toggle btn-sm w-100 h-25" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill-gear"></i> Admin
            </a>

            <ul class="dropdown-menu dropdown-menu-dark">
                <!-- <li><a class="dropdown-item" href="./manageAccount.php" style="font-size: 14px;">
                <i class="bi bi-people-fill" style="margin-right: 1rem;"></i>Manage Account</a></li> -->
                <li><a class="dropdown-item" href="./logout.php" style="font-size: 14px;">
                <i class="bi bi-box-arrow-right" style="margin-right: 1rem;"></i>Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="forms-wrapper">

        <?php
        require('../../reusable.php');
        include('../../notif.php');
        session_start();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // $query = "SELECT * FROM deliveries WHERE delivery_id = '$id' LIMIT 1";
            // $result = mysqli_query($conn, $query);
            // $row = mysqli_fetch_assoc($result);

            $deliveryStatus = "";

            if (isset($_POST['packedBySeller'])) {

                $deliveryStatus = "Packed by Seller";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            
            }

            if (isset($_POST['arrivedAtOverseasSortCenter'])) {

                $deliveryStatus = "Arrived at Overseas Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['departedFromOverseasSortCenter'])) {

                $deliveryStatus = "Departed From Overseas Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['atCustoms'])) {

                $deliveryStatus = "At Customs";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['arrivedAtDestinationCountry'])) {

                $deliveryStatus = "Arrived At Destination Country";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['arrivedAtSortCenter'])) {

                $deliveryStatus = "Arrived at Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['departedFromSortCenter'])) {

                $deliveryStatus = "Departed From Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['arrivedAtLogisticsHub'])) {

                $deliveryStatus = "Arrived at Logistics Hub";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['departedFromLogisticsHub'])) {

                $deliveryStatus = "Departed From Logistics Hub";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['outForDelivery'])) {

                $deliveryStatus = "Out For Delivery";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['packageArriving'])) {

                $deliveryStatus = "Package Arriving";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            }

            if (isset($_POST['delivered'])) {

                $deliveryStatus = "Delivered";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = './deliveryStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php

            }

            
        }
        ?>

        <form action="" method="POST" class="formButtons">
            <div class="btn1">
                <div class="m-2">
                    <button class="btn btn-warning" id="packedBySeller" name="packedBySeller" >Packed By Seller</button>
                </div>

                <div class="m-2">
                    <button class="btn btn-dark" name="arrivedAtOverseasSortCenter" >Arrived at Overseas Sort Center</button>
                </div>

                <div class="m-2">
                <button class="btn btn-dark" name="departedFromOverseasSortCenter" >Departed From Overseas Sort Center</button>
                </div>
            
                <div class="m-2">
                    <button class="btn btn-info" name="atCustoms" >At Customs</button>
                    <button class="btn btn-info" name="arrivedAtDestinationCountry" >Arrived at Destination Country</button>
                </div>
            </div>

            <div class="btn2">
                <div class="m-3">
                    <button class="btn btn-danger" name="arrivedAtSortCenter" >Arrived at Sort Center</button>
                    <button class="btn btn-danger" name="departedFromSortCenter" >Departed From Sort Center</button>
                </div>
                
                <div class="m-3">
                    <button class="btn btn-primary" name="arrivedAtLogisticsHub" >Arrived at Logistics Hub</button>
                    <button class="btn btn-primary" name="departedFromLogisticsHub" >Departed From Logistics Hub</button>
                </div>

                <div class="m-3">
                    <button class="btn btn-secondary" style="margin-right: 10px;" name="outForDelivery" >Out For Delivery</button>
                    <button class="btn btn-secondary" name="packageArriving" >Package Arriving</button>
                </div>
                
                <div class="m-3">
                    <button class="btn btn-success" name="delivered" id="delivered">Delivered</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Success -->
    <div class="modal fade" id="notifSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4aff4d;">
                </div>
                <div class="modal-body">
                    Delivery Status Updated Successfully!
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Success -->
</body>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script>
        // $(function() {

        //     $('#packedBySeller').on("click", function() {

        //         $(this).prop("disabled", true)
        //     })
        // })

    </script>

</html>
