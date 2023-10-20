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
            echo "<script> alert('Access Denied');</script>";
        }
    }   

    if (isset($_SESSION['username'])) {
        redirect('./dashboard/dashboard.php');
    }

// if (isset($_POST['loginSubmit'])) {
        
//             function validate($data) {
//                 $data = trim($data);
//                 $data = stripslashes($data);
//                 $data = htmlspecialchars($data);
//                 return $data;
//             }
            
//             $loginUsername = validate($_POST['loginUsername']);
//             $loginPassword = validate($_POST['loginPassword']);

//             $hash = password_hash($loginPassword, PASSWORD_DEFAULT);
    
//             $query = "INSERT INTO login VALUES (null, '$loginUsername', '$hash')";
//             $result = mysqli_query($conn, $query);

//         }
// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DITO</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link href="./css/login.css" rel="stylesheet">
</head>
<body>

    <div class="login-wrapper d-flex align-items-center justify-content-center">

    <div class="img-container">
        <img src="./css/dito.png" class="dito-img">
    </div>


        <form action="" method="POST" class="form-container">
            <strong class="greet">It's nice to have you back!</strong>
            <label class="labelUsername">Employee ID</label>
            <input type="text" name="loginUsername" required>
            <label class="labelPassword">Password</label>
            <input type="password" name="loginPassword" required>
            <button name="loginSubmit" class="btn btn-primary w-25 mt-2">Login</button>
        </form>
    


    </div>

    
    
</body>
    <script src="./css/bootstrap.bundle.min.js"></script>
</html>