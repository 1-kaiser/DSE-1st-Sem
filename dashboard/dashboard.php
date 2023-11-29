<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DITO | Dashboard</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Icons -->
    <link rel="stylesheet" href="../css/bootstrap-icons-1.11.1/bootstrap-icons.min.css">
</head>
<body>
<div class="sidebar">
        <img src="../css/dito.png" class="imgDito"> <br />
        <span class="admin-text">Admin</span> 
        <hr style="color: white;"/>
        <div class="links">

            <a href="#" class="link">
            <i class="bi bi-house-door-fill fs-5 text-white"></i>
            Home</a>

            <a href="./Client Request List/clientRequestList.php" class="link">
            <i class="bi bi-question-octagon fs-5 text-white"></i>
            Client Request List</a>

            <a href="./Client Request Status/clientRequestStatus.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client Request Status</a>

            <a href="./Delivery Status/deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <a href="./Client Request Status/acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="./Client Request Status/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>

        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Dashboard</span>
        <!-- Dropdown -->
        <div class="dropdown" style="margin-right: 18px;">
            <a class="btn btn-warning dropdown-toggle btn-sm w-100 h-25" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill-gear"></i> Admin
            </a>

            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="./manageAccount.php" style="font-size: 14px;">
                <i class="bi bi-people-fill" style="margin-right: 1rem;"></i>Manage Account</a></li>
                <li><a class="dropdown-item" href="./logout.php" style="font-size: 14px;">
                <i class="bi bi-box-arrow-right" style="margin-right: 1rem;"></i>Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="forms-wrapper">
        <div class="forms-container">
            <canvas id="adminChart"></canvas>

            <div class="datetime">
                <span class="time" style="color: #1328b1; font-weight: 600">4:30 PM</span>
                <span class="date" style="color: brown; font-weight: 600">Thursday, November 7, 2023</span>
            </div>

            <div class="track" style="margin: 5rem 0 0 3rem; width: 40rem;">
                <table class="table table-striped" style="margin: 0; width: 41rem;">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Delivery Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require('../reusable.php');
                        session_start();

                        $result = mysqli_query($conn, "SELECT * FROM deliveries");
                        while ($row = mysqli_fetch_assoc($result)) {
                            
                            ?>

                                <tr>
                                    <td><?= $row['delivery_id']?></td>
                                    <td><?= $row['customerName']?></td>
                                    <td><?= $row['productName']?></td>
                                    <td><?= $row['deliveryStatus']?></td>
                                </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

    <?php

        // $pendingReqRes = mysqli_query($conn, "SELECT * FROM dito.clientrequestlist");
        // $pendingReq = array();

        // while ($pendingRow = mysqli_fetch_assoc($pendingReqRes)) {
        //     $pendingReq[] = $pendingRow['id'];

        // }

        // $acceptedReqRes = mysqli_query($conn, "SELECT * FROM dito.acceptedrequest");
        // $acceptedReq = array();

        // while ($acceptedRow = mysqli_fetch_assoc($acceptedReqRes)) {
        //     $acceptedReq[] = $acceptedRow['id'];

        // }

        // $deniedReqRes = mysqli_query($conn, "SELECT * FROM dito.archive");
        // $deniedReq = array();

        // while ($deniedRow = mysqli_fetch_assoc($deniedReqRes)) {
        //     $deniedReq[] = $deniedRow['id'];

        // }
    ?>

    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    

    <script>

        const timeElement = document.querySelector('.time')
        const dateElement = document.querySelector('.date')

        function formatTime(date) {
            const hours12 = date.getHours() % 12 || 12
            const minutes = date.getMinutes()
            const isAM = date.getHours() < 12;

            return `${hours12.toString().padStart(2, "0")}:${minutes.toString().padStart(2, "0")} ${isAM ? "AM" : "PM"}`;
        }

        function formatDate(date) {
            const DAYS = [
                "Sunday",
                "Monday",
                "Tuesday",
                "Wednesday",
                "Thursday",
                "Friday",
                "Saturday"
            ];
            const MONTHS = [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December"
            ];

            return `${DAYS[date.getDay()]}, ${
                MONTHS[date.getMonth()]
            } ${date.getDate()} ${date.getFullYear()}`;
        }

        setInterval(() => {
            const now = new Date();

            timeElement.textContent = formatTime(now);
            dateElement.textContent = formatDate(now);
        }, 200);

        // Chart
        

        // Setup Block

        const data = {
                        labels: [
                            'Accepted Requests',
                            'Denied Requests',
                            'Pending Requests'
                        ],
                        datasets: [{
                            data: [12,5,3],
                            backgroundColor: [
                            '#7df1ad', //Green
                            '#f75d5d', // Red
                            '#f7e56a' // Yellow
                            ],
                            hoverOffset: 3
                        }]
                    };
        
        // Config Block

        const config = {

            type: "doughnut",
            data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }

        // Render Block
        const adminChart = new Chart(
            document.getElementById('adminChart'), config
        );
    </script>
</html>


            <!-- <div class="card">
                <p class="clientTitle">Total Client <br /> Request</p>
                <?php
                // $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                // $result = mysqli_query($conn, $query);
                // $total = mysqli_fetch_assoc($result);
                // $totalRows = $total['total_rows'];
                ?>

                <p class="total"> <?php echo $totalRows ?> </p>

            </div>  

            <div class="card" style="background-color: #D4F673;">
                <p class="clientTitle">Client Request <br /> History</p>
                <?php
                // $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                // $result = mysqli_query($conn, $query);
                // $total = mysqli_fetch_assoc($result);
                // $totalRows = $total['total_rows'];
                ?>

                <p class="total"> <?php echo $totalRows ?> </p>
                
            </div>  -->

            <!-- <div class="card" style="background-color: #D39AFF;">
                <p class="clientTitle">Total Clients</p>
                <?php
                // $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                // $result = mysqli_query($conn, $query);
                // $total = mysqli_fetch_assoc($result);
                // $totalRows = $total['total_rows'];
                ?>

                <p style="margin: 2rem 0 1rem 14.5rem;
                        font-size: 20px;"> <?php echo $totalRows ?> </p>
                
            </div>  -->

            <!-- <div class="card" style="background-color: #61E840;">
                <p class="clientTitle">Total Deliveries</p>
                <?php
                // $query = "SELECT COUNT(*) as total_rows FROM clientrequestlist";
                // $result = mysqli_query($conn, $query);
                // $total = mysqli_fetch_assoc($result);
                // $totalRows = $total['total_rows'];
                ?>

                <p style="margin: 2rem 0 1rem 14.5rem;
                        font-size: 20px;"></p> 
            </div>  -->


    <!-- <div class="canvas-container">
        <canvas id="myChart"></canvas>
    </div> -->