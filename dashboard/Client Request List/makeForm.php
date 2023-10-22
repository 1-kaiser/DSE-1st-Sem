<?php

require_once __DIR__ . '/vendor/autoload.php';

 if (isset($_POST['sendForm'])) {
    
    $clientName = $_POST['clientName'];
    $clientEmail = $_POST['clientEmail'];
    $clientContact = $_POST['clientContact'];
    $clientRequest = $_POST['clientRequest'];
    $requestPrice = $_POST['requestPrice'];

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->SetAuthor("DITO");

    $html = "
    <h1 style='font-family: sans-serif;'>Request Confirmation</h1>
    <p style='font-family: sans-serif;'>Name: $clientName</p>
    <p style='font-family: sans-serif;'>Email: $clientEmail</p>
    <p style='font-family: sans-serif;'>Contact: $clientContact</p>
        <table style='border: 1px solid black; width: 50rem; border-collapse: collapse;'>
            <thead>
            <tr >
            <th style='border: 1px solid black; border-collapse: collapse;'  scope='col'>Product</th>
            <th style='border: 1px solid black; border-collapse: collapse;'>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>$clientRequest</td>
            <td style='border: 1px solid black; border-collapse: collapse; text-align: center;'>$requestPrice</td>
            </tr>
        </tbody>
        </table>

    ";

    $mpdf->WriteHTML($html);
    $mpdf->Output('confirmation.pdf', 'I');

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

        <form class="form-container w-50" method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" placeholder="Client's name" aria-label="Username" aria-describedby="basic-addon1" name="clientName">
                </div>

                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Email</span>
                    <input type="email" class="form-control" placeholder="Client's email" aria-label="Recipient's username" aria-describedby="basic-addon2" name="clientEmail">
                    
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Contact</span>
                    <input type="number" class="form-control" placeholder="Client's contact number" aria-label="Username" aria-describedby="basic-addon1" name="clientContact">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Client's Request</span>
                    <textarea class="form-control" aria-label="With textarea" name="clientRequest"></textarea>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">₱</span>
                    <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="requestPrice">
                </div>
                <button class="btn btn-primary float-end" name="sendForm">Send</button>
        </form> 

    </div>
    
</body>
</html>