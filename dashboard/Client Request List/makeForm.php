<?php

require('../../reusable.php');

    if (isset($_POST['sendForm'])) {
        
        $clientName = $_POST['clientName'];
        $clientEmail = $_POST['clientEmail'];
        $clientContact = $_POST['clientContact'];
        $clientRequest = $_POST['clientRequest'];

        $html = "<h1>Form Submission</h1>";
        $html .= "<p><strong>Name:</strong> $clientName</p>";
        $html .= "<p><strong>Email:</strong> $clientEmail</p>";
        $html .= "<p><strong>Contact:</strong> $clientContact</p>";
        $html .= "<p><strong>Request:</strong> $clientRequest</p>";

        require_once __DIR__ . '/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf();
        $pdfFile = 'form_data.pdf';
        $pdf->Output($pdfFile, 'F');

        require('./vendor/phpmailer/phpmailer/src/PHPMailer');
        require('./vendor/phpmailer/phpmailer/src/SMTP');

        $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP();
        $mail->Host = 'emmanuelpunay6906@gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'emmanuelpunay6906@gmail.com';
        $mail->Password = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom('emmanuelpunay6906@gmail.com', 'Your Name');
        $mail->addAddress($clientEmail, $clientName);
        $mail->addAttachment($pdfFile); // Attach the PDF
        $mail->isHTML(true);

        if ($mail->send()) {
            echo "<script> alert('Sent Successfully');</script>";
        } else {
            echo "<script> alert('Access Denied');</script>";
        }
    }


?>


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
            <a href="../Packages List/packagesList.php" class="link">
                <img src="../../css/icons/icons8-package-50.png" class="icons">
            Packages List</a>
            <a href="../Delivery Status/deliveryStatus.php" class="link">
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

    <div class="makeForm-wrapper d-flex justify-content-start align-items-center flex-column">

    <div class="formTitle">
        <h4>Form</h4>
    </div>

        <div class="form-container w-50">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" placeholder="Client's name" aria-label="Username" aria-describedby="basic-addon1" name="clientName">
                </div>

                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Email</span>
                    <input type="text" class="form-control" placeholder="Client's email" aria-label="Recipient's username" aria-describedby="basic-addon2" name="clientEmail">
                    
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Contact</span>
                    <input type="text" class="form-control" placeholder="Client's contact number" aria-label="Username" aria-describedby="basic-addon1" name="clientContact">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Client's Request</span>
                    <textarea class="form-control" aria-label="With textarea" name="clientRequest"></textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">₱</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                </div>
                <button class="btn btn-primary float-end" name="sendForm">Send</button>
        </div>

    </div>
    
</body>
</html>