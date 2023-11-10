<?php

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted Request</title>

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

            <a href="../Client Request List/clientRequestList.php" class="link">
            <i class="bi bi-question-octagon fs-5 text-white"></i>
            Client Request List</a>

            <a href="./clientRequestStatus.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client Request Status</a>

            <a href="../Delivery Status/deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <a href="./acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="./archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>

        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Accepted Requests</span>
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

                        if (isset($_GET['id'])) {

                            $acceptedId = $_GET['id'];

                            $acceptedQuery = "INSERT INTO acceptedrequest (id, name, email, contact, request) SELECT id, name, email, contact, request FROM clientrequestlist WHERE id = '$acceptedId'";
                            
                            if (mysqli_query($conn, $acceptedQuery)) {

                                $deleteQuery = "DELETE FROM clientrequestlist WHERE id = '$acceptedId'";

                                if (mysqli_query($conn, $deleteQuery)) {
                                    // echo "Data from source_table deleted successfully.<br>";
                                }
                                // echo "Data from source_table inserted into destination_table successfully.<br>";

                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        }

                        if (isset($_POST['createDelivery'])) {
        
                            $orderDate = $_POST['orderDate'];
                            $printDate = $_POST['printDate'];
                            $delivery = $_POST['delivery'];
                            $sortCenter = $_POST['sortCenter'];
                            $orderNo = $_POST['orderNo'];
                            $trackingNo = $_POST['trackingNo'];
                            $customerName = $_POST['customerName'];
                            $customerAddress = $_POST['customerAddress'];
                            $sellerAddress = $_POST['sellerAddress'];
                            $productName = $_POST['productName'];
                            $paidPrice = $_POST['paidPrice'];
                            $quantity = $_POST['quantity'];
                    
                            $createQuery = "INSERT INTO deliveries VALUES (null, $customerName, $customerAddress, $productName, $paidPrice, $quantity, $orderDate, $printDate, $delivery, $sortCenter, $orderNo, $trackingNo, $sellerAddress)";
                            mysqli_query($conn, $createQuery);
                    
                            echo "<script>alert('Created Successfully');</script>";
                            header('./acceptedRequest.php');
                        }
                
                        // Retrieving of data
                        $query = "SELECT * FROM acceptedrequest";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td id="id"><?php echo $row['id'];?></td>
                                    <td id="name"><?php echo $row['name'];?></td>
                                    <td id="email"><?php echo $row['email'];?></td>
                                    <td id="contact"><?php echo $row['contact'];?></td>
                                    <td style="display: flex; justify-content: center; column-gap: 8px">
                                        
                                        <!-- <a href="./findProduct.php?id=<?php echo $row['id'];?>" class="btn btn-primary">
                                        <i class="bi bi-folder-plus"></i>&ensp;Manage Delivery
                                        </a> -->

                                        <button class="manageDelivery btn btn-primary" data-bs-toggle="modal" data-bs-target="#manageDelivery">
                                        <i class="bi bi-folder-plus"></i> Manage Delivery
                                        </button>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>

                    <div class="modal fade" id="manageDelivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Delivery</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="" method="POST" class="formDelivery row g-2">
                                        <div class="m-3 d-flex align-items-center">
                                            <label class="form-label">Order Date</label>
                                            <input type="date" name="orderDate" class="form-control w-25 border-secondary" style="margin-right: 1rem;" id="orderDate">

                                            <label class="form-label">Print Date</label>
                                            <input type="date" name="printDate" class="form-control w-25 border-secondary" id="printDate">
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label class="form-label">Delivery</label>
                                            <input type="text" name="delivery" class="form-control w-25 border-secondary" id="delivery">

                                            <label class="form-label">Sort Center</label>
                                            <input type="text" name="sortCenter" class="form-control w-25 border-secondary" id="sortCenter">
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label class="form-label" style="text-align: center">Order #</label>
                                            <input type="number" name="orderNo" class="form-control border-secondary" id="orderNo">

                                            <label class="form-label" style="text-align: center">Tracking #</label>
                                            <input type="number" name="trackingNo" class="form-control border-secondary" id="trackingNo">
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="buyerAddress" class="form-label">Customer Name</label>
                                            <input type="text" name="customerName" name="customerName"  class="form-control border-secondary" id="customerName">
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="buyerAddress" class="form-label">Customer Address</label>
                                            <input type="text" name="customerAddress" class="form-control border-secondary" id="buyerAddress">
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="sellerAddress" class="form-label">Seller Address</label>
                                            <input type="text" name="sellerAddress" class="form-control border-secondary" id="sellerAddress">
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="productName" class="form-label">Product Name</label>
                                            <input type="text" name="productName" class="form-control border-secondary" id="productName">

                                            <label for="paidPrice" class="form-label">Paid Price</label>
                                            <input type="number" name="paidPrice" class="form-control border-secondary" id="paidPrice">

                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control border-secondary" id="quantity">
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" name="createDelivery" class="btn btn-primary float-end">Create Delivery</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal End -->
                </tbody>
            </table>
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

    <script>
            $(document).ready( function () {
                $('#myTable').DataTable({
                    pageLength : 5,
                    lengthMenu: [[5, 10, 20], [5, 10, 20]]
                });
            } );
    </script>

    <script>
        $(document).ready(function() {

            $('.manageDelivery').click(function() {
                let id = $(this).data('id')
                $.ajax({
                    url: 'requestDetails.php',
                    method: 'post',
                    data: {id: id},
                    success: function(response) {
                        $('.manageDelivery').html(response)
                        $('#manageDelivery').modal('show')
                    }
                })
            })
        })

    </script>
</html>

