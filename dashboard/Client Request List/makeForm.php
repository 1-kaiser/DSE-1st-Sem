<?php
    use Mpdf\Mpdf;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';
    require_once __DIR__ . '/vendor/autoload.php';
    require('../../reusable.php');
    include('../../notif.php');
    session_start();

    //For PDF (Name, Email, Contact)
    $id = $_GET['id'];
    $query = "SELECT * FROM clientrequestlist WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['checkForm'])) {
        
        //Client Product Request
        $productName = $_POST['productName'];
        $productBrand = $_POST['productBrand'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $serviceFee = $_POST['serviceFee'];

            $mpdf = new \Mpdf\Mpdf([
                'default_font' => 'san-serif',
                'chroot' => __DIR__
            ]);

            $mpdf->SetAuthor("DITO");
            $mpdf->SetHeader('{PAGENO}');
            $mpdf->SetFooter('Copyright © 2023 DITO LMISCITNA - Group 5');

            $html .= "
            <img src='../../css/dito.png' style='width: 2rem; float:'/>
            <p style='font-size: 10px; position: absolute; left: 6.5rem; top: 3.6rem;'>Innovation and Technology Office</p>
            <p style='font-size: 10px; position: absolute; left: 41.3rem; top: 3.6rem;'>De La Salle University-Manila</p>
            <hr style='width: 100%; color: black; height: .5px;'/>
            ";

            $html .= "<h1 style='font-size: 1.5rem'>Request Confirmation</h1>";
            $html .= "<p style='font-size: 14px'> Name: ". $row['name'] ."</p>";
            $html .= "<p style='font-size: 14px'> Email: ". $row['email'] ."</p>";
            $html .= "<p style='font-size: 14px'> Address: ". $row['address'] ."</p>";
            $html .= "<p style='font-size: 14px'> Contact: ". $row['contact'] ."</p>";

            $html .= "<table style='border: 1px solid black; width: 100%; border-collapse: collapse;'>";
            $html .= "<tr>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Product Name</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Product Brand</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Quantity</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Price</th>";
            $html .= "</tr>";
            foreach ($productName as $keys => $values) {
                $html .= "<tr>";
                $html .= '<td style="text-align: center; border:1px solid black; padding: 10px;">'. $values .'</td>';
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $productBrand[$keys] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $productQuantity[$keys] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $productPrice[$keys] ."</td>";
                $html .= "</tr>";
            }
            $html .= "</table>";

            foreach ($productPrice as $key2 => $subTotal) {
                $subTotal *= $productQuantity[$key2];
                // $subTotal += $subTotal;
            }

            $serveFee = intval(implode('', $serviceFee));

            $total = $subTotal + $serveFee;

            $html .= "<p style=''>Subtotal:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;" .$subTotal. "</p>";

            $html .= "<p style=''>Service Fee:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .$serveFee. "</p>";

            $html .= "<hr style='width: 100%; border: 1px solid black'>";

            $html .= "<p style=''>Total:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .$total. "</p>";

            $html .= "
                    <p style='font-size: 12px; margin-top: 5rem'><strong><i>Note</i></strong>: The request confirmation that we have been emailed to you has a 1 week validity.
                    <br />If you want to accept the request deal, please respond via email.</p>
            ";

            $mpdf->WriteHTML($html);
            $mpdf->Output($row['name'].'Request-Confirmation.pdf', 'I');
            
    }

    if (isset($_POST['sendForm'])) {
        
        //Client Product Request
        $productName = $_POST['productName'];
        $productBrand = $_POST['productBrand'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];
        $serviceFee = $_POST['serviceFee'];

            $mpdf = new \Mpdf\Mpdf([
                'default_font' => 'san-serif',
                'chroot' => __DIR__
            ]);
            $mpdf->SetAuthor("DITO");
            $mpdf->SetHeader('{PAGENO}');
            $mpdf->SetFooter('Copyright © 2023 DITO LMISCITNA - Group 5');

            $html = "<img src='../../css/dito.png' style='width: 2rem; float:'/>
            <p style='font-size: 10px; position: absolute; left: 6.5rem; top: 3.6rem;'>Innovation and Technology Office</p>
            <p style='font-size: 10px; position: absolute; left: 41.3rem; top: 3.6rem;'>De La Salle University-Manila</p>
            <hr style='width: 100%; color: black; height: .5px;'/>
            ";

            $html .= "<h1 style='font-size: 1.5rem'>Request Confirmation</h1>";
            $html .= "<p style='font-size: 14px'> Name: ". $row['name'] ."</p>";
            $html .= "<p style='font-size: 14px'> Email: ". $row['email'] ."</p>";
            $html .= "<p style='font-size: 14px'> Address: ". $row['address'] ."</p>";
            $html .= "<p style='font-size: 14px'> Contact: ". $row['contact'] ."</p>";


            $html .= "<table style='border: 1px solid black; width: 100%; border-collapse: collapse;'>";
            $html .= "<tr>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Product Name</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Product Brand</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Quantity</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Price</th>";
            $html .= "</tr>";
            foreach ($productName as $keys => $values) {
                $html .= "<tr>";
                $html .= '<td style="text-align: center; border:1px solid black; padding: 10px;">'. $values .'</td>';
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $productBrand[$keys] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $productQuantity[$keys] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $productPrice[$keys] ."</td>";
                $html .= "</tr>";
            }
            $html .= "</table>";

            foreach ($productPrice as $key2 => $subTotal) {
                $subTotal *= $productQuantity[$key2];
                // $subTotal += $subTotal;
            }

            $serveFee = $serviceFee;

            $total = $subTotal + $serveFee;

            $html .= "<p style=''>Subtotal:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;" .$subTotal. "</p>";

            $html .= "<p style=''>Service Fee:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .$serveFee. "</p>";

            $html .= "<hr style='width: 100%; border: 1px solid black'>";

            $html .= "<p style=''>Total:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .$total. "</p>";

            $html .= "
                    <p style='font-size: 12px; margin-top: 5rem'><strong><i>Note</i></strong>: The request confirmation that we have been emailed to you has a 1 week validity.
                    <br />If you want to accept the request deal, please respond via email.</p>
            ";

            $mpdf->SetTitle('Request Confirmation');
            $mpdf->WriteHTML($html);
            $pdfContent = $mpdf->Output('', 'S');
            
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
            $mail->addAddress($row['email']);
            $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

            $mail->isHTML(true);
            $mail->Subject = 'Request Confirmation';
            $mail->Body = 'Good day, I am the admin of DITO LMISCITNA, please check your request.';
   
            try {
                $mail->send();
                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = '../Client Request Status/clientRequestStatus.php'
                            }, 1500);
                        })
                    </script>
                <?php
            } catch (Exception $e) {
                echo 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Request Form</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/clientRequestList.css">
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
            
            <a href="./clientRequestList.php" class="link">
            <i class="bi bi-question-octagon fs-5 text-white"></i>
            Client Request List</a>

            <a href="../Client Request Status/clientRequestStatus.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client Request Status</a>

            <a href="../Client Request Status/acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="../Delivery Status/deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <!-- <a href="../Monitoring/monitoring.php" class="link">
            <i class="bi bi-bookmark-fill fs-5 text-white"></i>
            Monitoring</a> -->

            <a href="../Client Request Status/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>

        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Client Request Form</span>
        
        <!-- Dropdown -->
        <div class="dropdown" style="margin-right: 18px;">
            <a class="btn btn-warning dropdown-toggle btn-sm w-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill-gear"></i> Admin
            </a>

            <ul class="dropdown-menu dropdown-menu-dark">
                <!-- <li><a class="dropdown-item" href="../manageAccount.php" style="font-size: 14px;">
                <i class="bi bi-people-fill" style="margin-right: 1rem;"></i>Manage Account</a></li> -->
                <li><a class="dropdown-item" href="../logout.php" style="font-size: 14px;">
                <i class="bi bi-box-arrow-right" style="margin-right: 1rem;"></i>Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="client-details">

    <div class="client-container">
        <p class="details">Name: <strong><?php echo $row['name'];?></strong></p>
        <p class="details">Email: <strong><?php echo $row['email'];?></strong></p>
    </div>

    </div>

    <div class="makeForm-wrapper d-flex justify-content-start align-items-center flex-column">

        <form class="form-container" style="width: 53rem; margin: 0 0 0 8rem;" action="" id="add_form" method="POST" target="_blank">

            <div class="container1" id="container">

                <button class="add_form_field btn btn-primary mb-3">Add New Field &nbsp; 
                    <span style="font-size:16px; font-weight:bold;">+</span>
                </button>
                
                <a href="./template.php?id=<?php echo $row['id']; ?>">
                        <button class="btn btn-primary mb-3" style="margin-left: 35.8rem;" id="checkButton" name="checkForm">Check Form</button>
                </a>

                <div class="input-group mb-2">

                    <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Product</span>
                    <input type="text" class="form-control" value="<?php echo $row['request']?>" name="productName[]" style="width: 8rem; margin-right: 6px;" required>

                    <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Brand</span>
                    <input type="text" class="form-control" name="productBrand[]" style="width: 4rem;" required>

                </div>

                <div class="input-group mb-2">

                    <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Price</span>
                    <input type="number" class="form-control" name="productPrice[]" style="width: 4rem;" required>

                    <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Quantity</span>
                    <input type="number" class="form-control" name="productQuantity[]" style="width: 2rem;" required>

                    <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Service Fee</span>
                    <input type="number" class="form-control" name="serviceFee" required>

                </div>
            </div>
            <a href="makeForm.php" target="_self">
            <button class="sendForm btn btn-success float-end" data-bs-toggle="modal" style="margin: 6px;" id="sendButton" name="sendForm">Send Form</button>
            </a>
        </form> 
    </div>

    <!-- Modal Success -->
    <div class="modal fade" id="notifSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4aff4d;">
                </div>
                <div class="modal-body">
                    Email sent successfully!
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
        $(document).ready(function() {
            
            $('.add_form_field').click(function(e) {
                e.preventDefault();

                $('#container').append(`
                    <div class="input-group mb-2" style="width: 55rem;">

                        <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Product</span>
                        <input type="text" class="form-control" name="productName[]" style="width: 8rem; margin-right: 6px;" required>

                        <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Brand</span>
                        <input type="text" class="form-control" name="productBrand[]" style="width: 4rem;" required>

                        <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Price</span>
                        <input type="number" class="form-control" name="productPrice[]" style="width: 4rem;" required>

                        <span class="input-group-text" id="basic-addon1" style="background-color: #c1c1c1;">Quantity</span>
                        <input type="number" class="form-control" name="productQuantity[]" style="width: 2rem;" required>
                        <button class="delete btn btn-danger">X</button>
                    </div>

                    
                `); 
            });

            $(document).on("click", ".delete", function(e) {
                    e.preventDefault();
                    let row = $(this).parent();
                    $(row).remove();
            });

            $('#checkButton').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'S',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response);
                    }
                })
            })
        });
    </script>
</html>