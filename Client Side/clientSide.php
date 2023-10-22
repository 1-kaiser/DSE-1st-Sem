<?php
require('../reusable.php');

            if (isset($_POST['requestSubmit'])) {
                
                $clientName = validate($_POST['clientName']);
                $clientEmail = validate($_POST['clientEmail']);
                $clientContact = validate($_POST['clientContact']);
                $clientRequest = $_POST['clientRequest'];
        
                $query = "INSERT INTO clientrequestlist VALUES (null, '$clientName', '$clientEmail', '$clientContact', '$clientRequest')";
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
</head>
<body>

    <div class="homepage-wrapper">
        <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #dd7c37;">
            <div class="container" >
                <a class="navbar-brand" href="#">
                    <span class="home">DITO LMISCITNA</span></a>
        </nav>

    </div>

    <div class="request-wrapper" id="request">

        <div class="requestTitle">
            <strong data-aos="fade-up">Need a Request?</strong>
        </div>

            <form action="" method="POST" class="requestForm">

            <div class="form-floating mb-2" data-aos="fade-up">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="clientName" required>
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-2" data-aos="fade-up" data-aos-delay="200">
                <input type="email" class="form-control" id="floatingEmail" placeholder="Email address" name="clientEmail" required>
                <label for="floatingPassword">Email</label>
            </div>
            <div class="form-floating mb-2" data-aos="fade-up" data-aos-delay="300"> 
                <input type="number" class="form-control" id="floatingPassword" placeholder="Contact Number" name="clientContact" required>
                <label for="floatingPassword">Contact</label>
            </div>
            <div class="mb-2" data-aos="fade-up" data-aos-delay="400">
                <label class="form-label">Your Request</label>
                <textarea class="form-control" id="clientRequest" rows="3" name="clientRequest" required></textarea>
            </div>
                <button name="requestSubmit" class="btn btn-primary float-end" style="width: 6rem;" data-aos="fade-up" data-aos-delay="500">Submit</button>
            </form>

        </div>
    </div>
  
</body>

        <script src="../css/aos.js"></script>
        <script>
            AOS.init();
        </script>
</html>