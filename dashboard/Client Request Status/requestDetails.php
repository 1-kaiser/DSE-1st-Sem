<?php

    if (isset($_POST['manageDelivery'])) {
        
        $id = $_POST['id'];
    
        $result = mysqli_query($conn, "SELECT * FROM clientrequestlist WHERE id = '$id'");
        while ($row = mysqli_fetch_array($result)) {
        ?>

                    

        <?php
    }
    }

    
?>