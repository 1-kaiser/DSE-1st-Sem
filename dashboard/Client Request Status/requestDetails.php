<?php
include('../../reusable.php');

    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $result = mysqli_query($conn, "SELECT * FROM acceptedrequest WHERE id = '$id'");
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $email = $row['email'];
            $address = $row['address'];
            $request = $row['request'];
            $array = array('name' => $name, 'email' => $email, 'address' => $address, 'request' => $request);
            echo json_encode($array);
    
    }


        
        

        
        


    
?>