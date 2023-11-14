<?php
require('./reusable.php');
session_start();

    if (isset($_POST['loginSubmit'])) {

        $loginUsername = validate($_POST['loginUsername']);
        $loginPassword = validate($_POST['loginPassword']);

        $query = "SELECT * FROM login WHERE employee_id = '$loginUsername' LIMIT 1";
        $result = mysqli_query($conn, $query);
        $granted = false;

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashed = $row['password'];

            if (!password_verify($loginPassword, $hashed)) {
                header("Location: login.php");
            } else {
                
                    $_SESSION['username'] = $row['employee_id'];
                    $granted = true;
                    redirect("./dashboard/dashboard.php");
                    exit();  
            }           
        } else {
            echo "<script> 
            alert('Access Denied');
            </script>";
        }
    }   

    if (isset($_SESSION['username'])) {
        redirect('./dashboard/dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DITO</title>
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="./css/login.css" rel="stylesheet">

</head>
<body>
    <div class="login-wrapper d-flex align-items-center justify-content-center">
        
        <!-- Login Container Box -->
        <div class="login-container">
            <form action="" method="POST" class="form-container" id="loginForm" style="width: 17rem">
                <div class="dito-title">
                <img src="./css/dito.png" style="width: 2rem;">
                <span class="home" style="font-size: 1rem;font-weight: 600;">LOGIN</span>
                </div>
                <p class="greet"><i>It's nice to have you back!</i></p>

                <div class="form">
                <input type="text" class="form-control" id="floatingName" placeholder="Employee ID" name="loginUsername" required>
                <br />
                </div>

                <div class="form mb-2">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="loginPassword" required>
                </div>

                <!-- <button name="loginSubmit" data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-primary mt-2">Login</button> -->
                <input type="submit" name="loginSubmit" data-bs-toggle="modal" class="btn btn-primary mt-2" value="Login"> 
            </form>
        </div>
        <!-- Login Container Box -->
        
    </div>


</body>
    <script src="./css/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/@splinetool/viewer@0.9.492/build/spline-viewer.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {

            $('#loginForm').validate({

                messages: {
                    loginUsername: {
                        required: "Please enter your Employee ID"
                    },
                    loginPassword: {
                        required: "Please enter your password"
                    }
                }
            })
        })
    </script>
    
</html>