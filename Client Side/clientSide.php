<?php
require('../reusable.php');
include('../notif.php');
session_start();

    if (isset($_POST['clientRequest'])) {
        
        $clientName = validate($_POST['clientName']);
        $clientEmail = validate($_POST['clientEmail']);
        $clientContact = validate($_POST['clientContact']);
        $clientAddress = validate($_POST['clientAddress']);
        $clientRequest = $_POST['clientRequest'];

        // $_SESSION['clientName'] = $clientName;
        // $_SESSION['clientEmail'] = $clientEmail;
        // $_SESSION['clientContact'] = $clientContact;
        // $_SESSION['clientAdress'] = $clientAddress;
        // $_SESSION['clientRequest'] = $clientRequest;

            $query = "INSERT INTO clientrequestlist VALUES (null, '$clientName', '$clientEmail', '$clientContact', '$clientAddress', '$clientRequest')";
            $result = mysqli_query($conn, $query);

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
    <!-- reCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Google AJAX API -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

        <div class="requestContainer d-flex gap-5">
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.6015400909164!2d120.99059027402363!3d14.564764185917339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c97ed286459b%3A0x5927068d997eae2a!2sDe%20La%20Salle%20University%20Manila!5e0!3m2!1sen!2sph!4v1702649125350!5m2!1sen!2sph" 
                width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

                <div class="form mb-3" >
                    <input type="text" class="form-control" id="floatingAddress" placeholder="Address" name="clientAddress" required>
                </div>

                <div class="form mb-3">
                    <textarea class="form-control" id="clientRequest" placeholder="Your request" rows="3" name="clientRequest" required></textarea>
                </div>

                <div class="form mb-3">
                    <div class="g-recaptcha" data-sitekey="6LcDqzIpAAAAAPLMHYb4tt8PkFnQsCZaKE5ck_7P"></div>
                </div>

                    <input type="submit" id="reqSubmit" class="btn btn-primary float-end" style="width: 6rem;" value="Submit" name="requestSubmit">

                    <!-- <button name="requestSubmit" type="button" data-bs-toggle="modal" data-bs-target="#myAlert" class="btn btn-primary float-end" style="width: 6rem;">Submit</button> -->
            </form>
        </div>

        
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
                    clientAddress: {
                        required: true
                    }
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
                    clientAddress: "Please enter your address",
                    clientRequest: "Please enter your request"
                }
            })
        })
    </script>

                    <!-- <script>
                    $(document).on("click", "#reqSubmit", function() {

                        const response = grecaptcha.getResponse()
                        
                        if (response.length > 0) {
                            window.location.href = './requestSuccess.php'
                        } else {
                            
                            return false
                        }
                    })
                </script> -->
</html>