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

            <a href="../Client Request Status/acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="./deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <a href="../Monitoring/monitoring.php" class="link">
            <i class="bi bi-bookmark-fill fs-5 text-white"></i>
            Monitoring</a>

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
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;
        require './vendor/phpmailer/phpmailer/src/Exception.php';
        require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require './vendor/phpmailer/phpmailer/src/SMTP.php';
        require_once __DIR__ . '/vendor/autoload.php';
        require('../../reusable.php');
        include('../../notif.php');
        session_start();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $deliveryStatus = "";

            if (isset($_POST['packedBySeller'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Packed by Seller";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                $pbsRes = mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package is packed and will be handed over to our logistics partner.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            
            }

            if (isset($_POST['arrivedAtOverseasSortCenter'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Arrived at Overseas Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has arrived at the overseas sortation center in China.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['departedFromOverseasSortCenter'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Departed From Overseas Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has departed from the overseas sortation center in China.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            
            }

            if (isset($_POST['atCustoms'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "At Customs";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package is currently undergoing international export customs clearance in preparation for departure to Philippines.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['arrivedAtDestinationCountry'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Arrived At Destination Country";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has arrived in Philippines and will undergo local customs clearance.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['arrivedAtSortCenter'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Arrived at Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package is currently undergoing international export customs clearance in preparation for departure to Philippines.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['arrivedAtDestinationCountry'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Arrived At Destination Country";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has arrived at sortation center and being prepared for shipment.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['departedFromSortCenter'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Departed From Sort Center";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has departed the sortation center.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['arrivedAtLogisticsHub'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Arrived at Logistics Hub";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has arrived at the local hub of LEX PH in your area.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['departedFromLogisticsHub'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Departed From Logistics Hub";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has departed the logistics hub and will be out for delivery soon.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['outForDelivery'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Out For Delivery";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                LEX PH will attempt to deliver your parcel today! Please keep your lines open so our carrier will contact you.
                <br>
                If you are not available, please have an authorized representative to receive on your behalf, <br>
                prepare the exact amount for COD orders.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['packageArriving'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Package Arriving";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package is arriving soon! Please prepare an exact amount for the package.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
            }

            if (isset($_POST['delivered'])) {

                $pbsFetchData = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
                $row = mysqli_fetch_assoc($pbsFetchData);

                $deliveryStatus = "Delivered";
                $pbsQuery = "UPDATE deliveries SET deliveryStatus = '$deliveryStatus' WHERE delivery_id = '$id'";
                mysqli_query($conn, $pbsQuery);

                //PHP Mailer
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'ditolmisctna@gmail.com';
                $mail->Password = 'pbep tvhw isct dzbk';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

                $mail->setFrom('ditolmisctna@gmail.com');
                $mail->addAddress($row['customerEmail']);
                // $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

                $mail->isHTML(true);
                $mail->Subject = 'Your Delivery Status';
                $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, 
                <br><br>
                Your package has been delivered.
                <br><br>
                Thank you.';
    
                try {
                    $mail->send();
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
                } catch (Exception $e) {
                    echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                }
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

</html>
