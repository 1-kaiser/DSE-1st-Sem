<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Account</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/manageAccount.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="../css/bootstrap-icons-1.11.1/bootstrap-icons.min.css">

</head>
<body>
    <div class="sidebar">
        <img src="../css/dito.png" class="imgDito"> <br />
        <span class="admin-text">Admin</span> 
        <hr style="color: white;"/>
        <div class="links">

            <a href="./dashboard.php" class="link">
            <i class="bi bi-house-door-fill fs-5 text-white"></i>
            Home</a>

            <a href="./Client Request List/clientRequestList.php" class="link">
            <i class="bi bi-question-octagon fs-5 text-white"></i>
            Client Request List</a>

            <a href="./Client Request Status/clientRequestStatus.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client Request Status</a>

            <a href="./Delivery Status/deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <a href="./Client Request Status/acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="./Client Request Status/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Manage Account</span>
        
        <!-- Dropdown -->
        <div class="dropdown" style="margin-right: 18px;">
            <a class="btn btn-warning dropdown-toggle btn-sm w-100 h-25" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill-gear"></i> Admin
            </a>

            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#" style="font-size: 14px;">
                <i class="bi bi-people-fill" style="margin-right: 1rem;"></i>Manage Account</a></li>
                <li><a class="dropdown-item" href="./logout.php" style="font-size: 14px;">
                <i class="bi bi-box-arrow-right" style="margin-right: 1rem;"></i>Logout</a></li>
            </ul>
        </div>
    </div>

    <?php
    require('../reusable.php');

    $accountQueryRes = mysqli_query($conn, "SELECT * FROM login LIMIT 1");
    $accountRow = mysqli_fetch_assoc($accountQueryRes);
    
    ?>

    <div class="manageAccount-wrapper">
        <div class="manageAccount-container">

            <form action="" method="POST" class="d-flex">

                <div class="box1">
                    <div class="mb-3 d-flex" style="width: 32rem; margin: 3rem 0 0 4rem;">
                        <div class="1">
                            <label class="form-label">Employee ID</label>
                            <input type="text" id="employeeID" class="form-control border-dark" value="<?php echo $accountRow['employee_id']?>" readonly>
                        </div>

                        <div class="2" style="margin-left: 2rem;">
                            <label class="form-label">Creation Date</label>
                            <input type="text" id="employeeID" class="form-control border-dark" value="<?php echo $accountRow['creationDate']?>" readonly>
                        </div>   
                    </div>

                    <div class="mb-3 d-flex" style="width: 32rem; margin: 1rem 0 0 4rem;">
                        <div class="1">
                            <label class="form-label">Password</label>
                            <input type="text" id="employeeID" class="form-control border-dark" value="<?php echo $accountRow['password']?>" readonly>
                        </div>
                        <div class="2" style="margin-left: 2rem;">
                            <label class="form-label">Role</label>
                            <input type="text" id="employeeID" class="form-control border-dark" value="<?php echo $accountRow['role']?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 editAccount" style="margin-left: 4rem;">
                        <button class="btn btn-primary">Create Account</button>
                    </div>
                </div>

                <div class="box2">

                    <div class="img" style="border: 1px solid black; width: 11rem;
                                            height: 10rem;
                                            margin: 3rem 0 0 0;">

                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" class="mt-3" name="pic" accept=".jpg, .jpeg, .png">
                        </div>
                        <div class="mb-2">
                            <button type="submit" name="editImage" class="btn btn-danger">Edit Image</button>
                        </div>
                        <?php

                            if (isset($_POST['editImage'])) {

                                // if ($_FILES['pic']['tmp_name'] == false) {
                                    
                                //     echo "<script>alert('Please select an image.');window.history.back();</script>";
                                // } else {

                                //     // $id = $accountRow['employee_id'];
                                    
                                //     // $image = addslashes($_FILES['pic']['tmp_name']);
                                //     // $imageName = addslashes($_FILES['pic']['name']);
                                //     // $image = file_get_contents($image);
                                //     // $image = base64_encode($image);

                                //     // $picQuery = mysqli_query($conn, "UPDATE login SET pic = '$imageName' WHERE employee_id = 'id'");

                                    
                                // }
                                
                                
                               
                               
                            }
                        
                        ?>
                    </form>
                </div>
            </form>
        </div>
    </div>
    
</body>
    
    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>

    <!-- <script>
            $(document).ready( function () {
                $('#myTable').DataTable({
                    pageLength : 5,
                    lengthMenu: [[5, 10, 20], [5, 10, 20]]
                });
            } );
    </script>

    <script>
        $(document).ready(function() {

            $('.reqDetails').click(function() {
                let id = $(this).data('id')
                $.ajax({
                    url: 'clientDetails.php',
                    method: 'post',
                    data: {id: id},
                    success: function(response) {
                        $('.modal-body').html(response)
                        $('#checkRequest').modal('show')
                    }
                })
            })
        })
    </script> -->
</html>

