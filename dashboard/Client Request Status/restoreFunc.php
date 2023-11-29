<?php
require('../../reusable.php');

    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $restoreQuery = "INSERT INTO clientrequestlist (id, name, email, contact, request) SELECT id, archiveName, archiveEmail, archiveContact, archiveRequest FROM archive WHERE id = '$id'";
        
        if (mysqli_query($conn, $restoreQuery)) {
            
            $deleteQuery = "DELETE FROM archive WHERE id = '$id'";

            if (mysqli_query($conn, $deleteQuery)) {

                echo "<script>
                alert('Restored Successfully')
                window.location.href = './archive.php'</script>";
            }
        }
    }
    
?>