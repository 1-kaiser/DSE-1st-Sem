<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require './vendor/phpmailer/phpmailer/src/Exception.php';
    require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require './vendor/phpmailer/phpmailer/src/SMTP.php';
    require_once __DIR__ . '/vendor/autoload.php';
    require('../../reusable.php');

    //For PDF (Name, Email, Contact)
    $id = $_GET['id'];
    $query = "SELECT * FROM clientrequestlist WHERE id = '$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['checkForm'])) {
        
        //Client Product Request
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];

        foreach ($productName as $key => $value) {
            // $queryProductInsert = "INSERT INTO clientform VALUES (null, '$value', '$productPrice[$key]', '$productQuantity[$key]')";
            // $queryProductResult = mysqli_query($conn, $queryProductInsert);
        }
        
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->SetAuthor("DITO");

            $html = "<h1>Request Confirmation</h1>";
            $html .= "<p> Name: ". $row['name'] ."</p>";
            $html .= "<p> Email: ". $row['email'] ."</p>";
            $html .= "<p> Contact: ". $row['contact'] ."</p>";


            $html .= "<table style='border: 1px solid black; width: 100%; border-collapse: collapse;'>";
            $html .= "<tr>";
                $html .= "<th style='border:1px solid black;'>Product Name</th>";
                $html .= "<th style='border:1px solid black;'>Quantity</th>";
                $html .= "<th style='border:1px solid black;'>Price</th>";
            $html .= "</tr>";
            foreach ($productName as $keys => $values) {
                $html .= "<tr>";
                $html .= '<td style="text-align: center; border:1px solid black; padding: 10px;">'. $values .'</td>';
                $html .= "<td style='text-align: center; border:1px solid black;'>". $productQuantity[$keys] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black;'>". $productPrice[$keys] ."</td>";
                $html .= "</tr>";
            }
            $html .= "</table>";

            foreach ($productPrice as $key2 => $subTotal) {
                $subTotal *= $productQuantity[$key2];
                $subTotal += $subTotal;
            }

            

            $serviceFee = 75;
            $shippingFee = 38;

            $totalPrice = $subTotal + $serviceFee + $shippingFee;


            $html .= "<p style=''>Subtotal:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .$subTotal. "</p>";

            $html .= "<p style=''>Service Fee:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;" .$serviceFee. "</p>";

            $html .= "<p style=''>Shipping Fee:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;" .$shippingFee. "</p>";

            $html .= "<hr style='color: black' />";

            $html .= "<p style=''>Total:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;" .$totalPrice. "</p>";

            $mpdf->WriteHTML($html);
            $mpdf->Output($row['name'].'Request-Confirmation.pdf', 'I');
            
    }

    if (isset($_POST['sendForm'])) {
        
        //Client Product Request
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];
        $productQuantity = $_POST['productQuantity'];

        // foreach ($productName as $key => $value) {
        //     $queryProductInsert = "INSERT INTO clientform VALUES (null, '$value', '$productPrice[$key]', '$productQuantity[$key]')";
        //     $queryProductResult = mysqli_query($conn, $queryProductInsert);
        // }
        
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->SetAuthor("DITO");

            $html = "<h1>Request Confirmation</h1>";
            $html .= "<p> Name: ". $row['name'] ."</p>";
            $html .= "<p> Email: ". $row['email'] ."</p>";
            $html .= "<p> Contact: ". $row['contact'] ."</p>";


            $html .= "<table style='border: 1px solid black; width: 100%; border-collapse: collapse;'>";
            $html .= "<tr>";
                $html .= "<th style='border:1px solid black;'>Product Name</th>";
                $html .= "<th style='border:1px solid black;'>Quantity</th>";
                $html .= "<th style='border:1px solid black;'>Price</th>";
            $html .= "</tr>";
            foreach ($productName as $keys => $values) {
                $html .= "<tr>";
                $html .= '<td style="text-align: center; border:1px solid black; padding: 10px;">'. $values .'</td>';
                $html .= "<td style='text-align: center; border:1px solid black;'>". $productQuantity[$keys] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black;'>". $productPrice[$keys] ."</td>";
                $html .= "</tr>";
            }
            $html .= "</table>";

            foreach ($productPrice as $key2 => $subTotal) {
                $subTotal *= $productQuantity[$key2];
                $subTotal += $subTotal;
            }

            $serviceFee = 75;
            $shippingFee = 38;

            $totalPrice = $subTotal + $serviceFee + $shippingFee;


            $html .= "<p style=''>Subtotal:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;" .$subTotal. "</p>";

            $html .= "<p style=''>Service Fee:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;" .$serviceFee. "</p>";

            $html .= "<p style=''>Shipping Fee:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;" .$shippingFee. "</p>";

            $html .= "<hr style='color: black' />";

            $html .= "<p style=''>Total:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;" .$totalPrice. "</p>";

            $mpdf->WriteHTML($html);
            $pdfContent = $mpdf->Output($row['name'].' Request-Confirmation.pdf', 'S');
            
            //PHP Mailer
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'doe913885@gmail.com';
            $mail->Password = 'xsog ulql bezu mfca';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('doe913885@gmail.com');
            $mail->addAddress($row['email']);
            $mail->addStringAttachment($pdfContent, 'Request-Confirmation.pdf');

            $mail->isHTML(true);
            $mail->Subject = 'Request Confirmation';
            $mail->Body = 'Good day, please check your request.';
   
            try {
                $mail->send();
                echo 'Email sent successfully!';
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
    <title>Client Request List</title>

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
            <a href="../Client History/clientHIstory.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client History</a>
            <a href="../Client History/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>
            <!-- <a href="./Delivery Status/deliveryStatus.php" class="link">
                <img src="../../css/icons/icons8-shipped-50.png" class="icons">
            Delivery Status</a> -->
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Client Request Form</span>
        <a href="" class="manage btn-btn-success">
        <i class="bi bi-person-fill-gear"></i>
        <span>Manage Your Account</span>
        </a>
    </div>

    <div class="client-details">

    <div class="client-container">
        <p class="details">Name: <strong><?php echo $row['name'];?></strong></p>
        <p class="details">Email: <strong><?php echo $row['email'];?></strong></p>
    </div>

    </div>

    <div class="makeForm-wrapper d-flex justify-content-start align-items-center flex-column">

    <!-- <div class="formTitle">
        <h4>Request Product Form</h4>
    </div> -->

        <form class="form-container w-50" action="" id="add_form" method="POST" target="_blank">

                <div class="container1" id="container">

                    <button class="add_form_field btn btn-primary mb-3 float-end">Add New Field &nbsp; 
                        <span style="font-size:16px; font-weight:bold;">+</span>
                    </button>
                    <div class="input-group mb-2" style="width: 50rem;">
                        <span class="input-group-text" id="basic-addon1">Product</span>
                        <input type="text" class="form-control" placeholder="Product" name="productName[]" required>
                        <span class="input-group-text" id="basic-addon1">Price</span>
                        <input type="number" class="form-control" placeholder="Price" name="productPrice[]" required>
                        <span class="input-group-text" id="basic-addon1">Quantity</span>
                        <input type="number" class="form-control" placeholder="Quantity" name="productQuantity[]" required>
                        <a href="./template.php?id=<?php echo $row['id']; ?>">
                            <button class="btn btn-primary" id="checkButton" name="checkForm">Check Form</button>
                        </a>
                    </div>
                </div>

                <a href="./template.php?id=<?php echo $row['id']; ?>">
                            <button class="btn btn-success float-end" id="sendButton" name="sendForm">Send Form</button>
                </a>   
        </form> 
    </div>
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
                    <div class="input-group mb-2" style="width: 45.4rem;">
                        <span class="input-group-text" id="basic-addon1">Product</span>
                        <input type="text" class="form-control" placeholder="Product" name="productName[]" required>
                        <span class="input-group-text" id="basic-addon1">Price</span>
                        <input type="number" class="form-control" placeholder="Price" name="productPrice[]" required>
                        <span class="input-group-text" id="basic-addon1">Quantity</span>
                        <input type="number" class="form-control" placeholder="Quantity" name="productQuantity[]" required>
                        <a href="" class="delete btn btn-danger">X</a>
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