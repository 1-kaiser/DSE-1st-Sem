<?php
require('../reusable.php');
session_start();

    if (isset($_POST['clientRequest'])) {
        
        $clientName = validate($_POST['clientName']);
        $clientEmail = validate($_POST['clientEmail']);
        $clientContact = validate($_POST['clientContact']);
        $clientRequest = $_POST['clientRequest'];

            $query = "INSERT INTO clientrequestlist VALUES (null, '$clientName', '$clientEmail', '$clientContact', '$clientRequest')";
            $result = mysqli_query($conn, $query);

            $_SESSION['clientName'] = $clientName;

            redirect('./requestSuccess.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/clientSide.css">
    <link rel="stylesheet" href="../css/aos.css">
</head>
<body>
    <div class="homepage-wrapper">
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #115e31;">
            <div class="container" >
                <div class="title-container" style="display: flex;">
                <a class="navbar-brand" href="#">
                    <img src="../css/dito.png" style="border-radius: 50%; width: 1.5rem;">
                    <span class="home">DITO LMISCITNA</span></a>
                </div>
                <div class="links-container">
                    <a class="navbar-brand" href="#">
                        <span class="home">Home</span></a>
                    <a class="navbar-brand" href="#mission">
                        <span class="home">Mission</span></a>
                    <a class="navbar-brand" href="#aboutUs">
                        <span class="home">About Us</span></a>
                    <a class="navbar-brand" href="#request">
                        <span class="home">Request</span></a>
                </div>
            </div>
        </nav>
    </div>

    <div class="homepage2-wrapper" id="mission"></div>

    <div class="homepage3-wrapper" id="aboutUs"></div>

    <div class="request-wrapper" id="request">

        <div class="requestTitle">
            <strong data-aos="fade-up">Need a Request?</strong>
        </div>

        <form action="" method="POST" class="requestForm" id="formRequest">

            <div class="form mb-3">
                <input type="text" class="form-control" id="floatingName" placeholder="Name" name="clientName" required>
            </div>
            
            <div class="form mb-3" >
                <input type="email" class="form-control" id="floatingEmail" placeholder="Email address" name="clientEmail" required>
            </div>
                    
            <div class="form mb-3" >
                <input type="number" class="form-control" id="floatingContact" placeholder="Contact Number" name="clientContact" required>
            </div>

            <div class="form mb-3">
                <textarea class="form-control" id="clientRequest" placeholder="Your request" rows="3" name="clientRequest" required></textarea>
            </div>

                <input type="submit" id="reqSubmit" class="btn btn-primary float-end" style="width: 6rem;" value="Submit" name="requestSubmit">

                <!-- <button name="requestSubmit" type="button" data-bs-toggle="modal" data-bs-target="#myAlert" class="btn btn-primary float-end" style="width: 6rem;">Submit</button> -->
        </form>
    </div>


</body>
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
    <script src="../css/aos.js"></script>

    <script>
        AOS.init();
    </script>

    <script>
        $(document).ready(function() {
            $('#formRequest').validate({
                rules: {
                    clientName: {
                        required: true,
                        // nowhitespace: false,
                        // lettersonly: true,
                        minlength: 2,
                        maxlength: 50,
                        
                    },
                    clientEmail: {
                        email: true,
                        required: true
                    },
                    clientContact: {
                        number: true,
                        maxlength: 11,
                        minlength: 11
                    },
                },
                messages: {
                    clientName: {
                        required: "Please enter your name",
                        minlength: "Name atleast 2 characters", 
                    },
                    clientEmail: {
                        required: "Please enter your email"
                    },
                    clientContact: {
                        required: "Please enter your contact",
                        minlength: "Must 11 digits length"
                    },
                    clientRequest: "Please enter your request"
                }
            })
        })
    </script>
</html>