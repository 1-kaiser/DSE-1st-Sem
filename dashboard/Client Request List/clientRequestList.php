<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Request List</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/clientRequestList.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="../../css/bootstrap-icons-1.11.1/bootstrap-icons.min.css">

</head>
<body>
    <div class="sidebar">
        <img src="../../css/dito.png" class="imgDito"> <br />
        <span class="admin-text">Admin</span> 
        <hr style="color: white;"/>
        <div class="links">
        <a href="../dashboard.php" class="link">
            <i class="bi bi-house-door-fill fs-5 text-white"></i>
            Home</a>
            <a href="#" class="link">
            <i class="bi bi-question-octagon fs-5 text-white"></i>
            Client Request List</a>
            <a href="../Client History/clientHIstory.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client History</a>
            <a href="../Client History/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>
            <!-- <a href="./Delivery Status/deliveryStatus.php" class="link">
                <img src="../../css/icons/icons8-shipped-50.png" class="icons">
            Delivery Status</a> -->
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Client Request List</span>
        <a href="" class="manage btn-btn-success">
        <i class="bi bi-person-fill-gear"></i>
        <span>Manage Your Account</span>
        </a>
    </div>

    <div class="clientRequestList-wrapper">

        <div class="table-container">
            <table class="table table-striped ml-4" style="width: 60rem; margin: 2rem 0 0 7rem;" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require('../../reusable.php');

                        $query = "SELECT * FROM clientrequestlist";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['contact'];?></td>
                                    <td style="display: flex; justify-content: center; column-gap: 8px">
                                        
                                        <a href="./checkRequest.php?id=<?php echo $row['id'];?>" style="text-decoration: none;" class="btn btn-secondary">
                                        <i class="bi bi-view-list"></i>
                                        </a>
                                        
                                        <a href="./findProduct.php?id=<?php echo $row['id'];?>" class="btn btn-primary">
                                        <i class="bi bi-bag-fill"></i>
                                        </a>

                                        <a href="./makeForm.php?id=<?php echo $row['id'];?>" target="_blank" class="btn btn-success">Make Form</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Starts Here -->

        <div class="modal fade" id="checkRequest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Client Request Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label class="checkForm">Name</label>
                    <div><strong><?php echo $row['name'];?></strong></div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>

    <!-- Modal Ends Here -->
    
</body>
    
    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
            $(document).ready( function () {
                $('#myTable').DataTable({
                    pageLength : 5,
                    lengthMenu: [[5, 10, 20], [5, 10, 20]]
                });
            } );
    </script>
</html>