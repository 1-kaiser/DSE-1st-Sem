<?php
require('../../reusable.php');
include('../../notif.php');

    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $restoreQuery = "INSERT INTO clientrequestlist (id, name, email, contact, address, request) SELECT id, archiveName, archiveEmail, archiveContact, archiveAddress, archiveRequest FROM archive WHERE id = '$id'";
        
        if (mysqli_query($conn, $restoreQuery)) {
            
            $deleteQuery = "DELETE FROM archive WHERE id = '$id'";

            if (mysqli_query($conn, $deleteQuery)) {

                ?>
                    <script>
                        $(document).ready(function() {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                window.location.href = '../Client Request List/clientRequestList.php'
                            }, 2000);
                        })
                    </script>
                <?php
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<body>

    <!-- Modal Success -->
    <div class="modal fade" id="notifSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4aff4d;">
                </div>
                <div class="modal-body">
                    Record has been Restored Successfully!
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Success -->
    
</body>
    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>