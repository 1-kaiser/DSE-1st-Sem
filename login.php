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
                redirect("./dashboard/dashboard.php");
                $_SESSION['username'] = $row['employee_id'];
                $granted = true;
                exit();
            }
                                 
        } else {
            echo 'male';
            redirect("login.php");
        }
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
</head>
<body>

    <form action="" method="POST">
        <input type="text" name="loginUsername" required>
        <input type="password" name="loginPassword" required>
        <button name="loginSubmit">Login</button>
    </form>
    
</body>
</html>