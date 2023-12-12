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

            <a href="./acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="../Delivery Status/deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <!-- <a href="../Monitoring/monitoring.php" class="link">
            <i class="bi bi-bookmark-fill fs-5 text-white"></i>
            Monitoring</a> -->

            <a href="./archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>

        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Accepted Requests</span>
        
        <!-- Dropdown -->
        <div class="dropdown" style="margin-right: 18px;">
            <a class="btn btn-warning dropdown-toggle btn-sm w-100 h-25" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill-gear"></i> Admin
            </a>

            <ul class="dropdown-menu dropdown-menu-dark">
                <!-- <li><a class="dropdown-item" href="../manageAccount.php" style="font-size: 14px;">
                <i class="bi bi-people-fill" style="margin-right: 1rem;"></i>Manage Account</a></li> -->
                <li><a class="dropdown-item" href="../logout.php" style="font-size: 14px;">
                <i class="bi bi-box-arrow-right" style="margin-right: 1rem;"></i>Logout</a></li>
            </ul>
        </div>
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
                        include('../../notif.php');
                        session_start();

                        if (isset($_GET['id'])) {

                            $acceptedId = $_GET['id'];

                            $acceptedQuery = "INSERT INTO acceptedrequest (id, name, email, contact, address, request) SELECT id, name, email, contact, address, request FROM clientrequestlist WHERE id = '$acceptedId'";
                            
                            if (mysqli_query($conn, $acceptedQuery)) {

                                $deleteQuery = "DELETE FROM clientrequestlist WHERE id = '$acceptedId'";

                                if (mysqli_query($conn, $deleteQuery)) {
                                    ?>
                                    <script>
                                        Swal.fire({
                                        title: "Request Accepted!",
                                        icon: "success"
                                        });
                                    </script>
                                    <?php
                                }

                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }

                            $displayQueryRes = mysqli_query($conn, "SELECT * FROM acceptedrequest WHERE id = '$acceptedId'");
                            $displayRow = mysqli_fetch_assoc($displayQueryRes);
  
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

                                        <!-- <a href="" class="manageDelivery btn btn-primary" data-bs-toggle="modal" data-bs-target="#manageDelivery" data-id="<?php echo $row['id'];?>">
                                        <i class="bi bi-folder-plus"></i> Manage Delivery
                                        </a> -->

                                        <!-- <button style="text-decoration: none;" class="manageDelivery btn btn-primary" data-id="<?php echo $row['id'];?>" data-bs-toggle="modal" data-bs-target="#checkRequest">
                                        <i class="bi bi-folder-plus"></i> Manage Delivery
                                        </button> -->

                                        <button class="manageDelivery btn btn-primary" value="<?php echo $row['id'];?>" data-id="" data-bs-toggle="modal" data-bs-target="#manageDelivery" >
                                            <i class="bi bi-folder-plus"></i> Manage Delivery
                                        </button>
                                    </td>
                                </tr>
                            <?php
                        }

                        $randOrderNo = rand(10000000000000, 99999999999999);
                        $randTrackingNo = rand(10000000000000, 99999999999999);
                        $sort_center = "DITO LMSICITNA";
                        $carrierContact = rand(9000000000, 9999999999);
                    ?>

                    <div class="modal fade" id="manageDelivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Manage Delivery</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="" method="POST" class="formDelivery row g-2" id="deliveryDetails">
                                        <div class="m-3 d-flex align-items-center">
                                            <label class="form-label">Order Date</label>
                                            <input type="date" name="orderDate" class="form-control w-25 border-secondary" style="margin-right: 1rem;" id="orderDate" required>

                                            <label class="form-label">Expected Deliver Date</label>
                                            <input type="date" name="printDate" class="form-control w-25 border-secondary" id="printDate" required>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <!-- <label class="form-label">Carrier</label>
                                            <input type="text" name="delivery" class="form-control w-25 border-secondary" id="delivery" required> -->

                                            <label class="form-label" style="margin-right: 1rem;">Carrier</label>
                                            <select class="form-select border-secondary" name="carrier" style="width: 11rem;">
                                                <option>Ernesto Santos</option>
                                                <option>Harvey Beloria</option>
                                                <option>Mike Wazowski</option>
                                                <option>Efren De Castro</option>
                                                <option>Denzel Rivera</option>
                                                <option>John Carlo Catchero</option>
                                                <option>Mike Wazowski</option>
                                                <option>Charles Drio</option>
                                                <option>Angelito Abanilla</option>
                                                <option>Mark Vince Tan</option>
                                            </select>

                                            <label class="form-label text-center">Carrier Contact</label>
                                            <input type="number" name="carrierContact" class="form-control w-25 border-secondary" id="carrierContact" value="0<?= $carrierContact?>" readonly>

                                            <label class="form-label text-center">Sort Center</label>
                                            <input type="text" name="sortCenter" class="form-control w-25 border-secondary" id="sortCenter" value="<?= $sort_center?>" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label class="form-label" style="text-align: center">Order #</label>
                                            <input type="number" name="orderNo" class="form-control border-secondary" id="orderNo" value="<?= $randOrderNo;?>" readonly>

                                            <label class="form-label" style="text-align: center">Tracking #</label>
                                            <input type="number" name="trackingNo" class="form-control border-secondary" id="trackingNo" value="<?= $randTrackingNo;?>" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="buyerAddress" class="form-label">Customer Name</label>
                                            <input type="text" name="customerName" class="form-control border-secondary" id="customerName" value="" readonly>
                                        
                                            <label for="customerAddress" class="form-label">Customer Address</label>
                                            <input type="text" name="customerAddress" class="form-control border-secondary" id="customerAddress" readonly>
                                        </div>

                                        <!-- <div class="m-3 d-flex align-items-center">
                                            <label for="buyerAddress" class="form-label">Customer Address</label>
                                            <input type="text" name="customerAddress" class="form-control border-secondary" id="buyerAddress" required>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="sellerAddress" class="form-label">Seller Address</label>
                                            <input type="text" name="sellerAddress" class="form-control border-secondary" id="sellerAddress" required>
                                        </div> -->

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="customerEmail" class="form-label text-center">Customer Email</label>
                                            <input type="text" name="customerEmail" class="form-control border-secondary" id="customerEmail" readonly>

                                            <label for="productName" class="form-label text-center">Product Name</label>
                                            <input type="text" name="productName" class="form-control border-secondary" id="productName" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="productBrand" class="form-label text-center">Product Brand</label>
                                            <input type="text" name="productBrand" class="form-control border-secondary" id="productBrand" required>

                                            <label for="paidPrice" class="form-label">Price</label>
                                            <input type="number" name="productPrice" class="form-control border-secondary" id="productPrice" required>

                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control border-secondary" id="quantity" required>
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
                <?php
                    if (isset($_POST['createDelivery'])) {
                        
                            $customerName = $_POST['customerName'];
                            $customerEmail = $_POST['customerEmail'];
                            $customerAddress = $_POST['customerAddress'];
                            $productName = $_POST['productName'];
                            $productBrand = $_POST['productBrand'];
                            $productPrice = $_POST['productPrice'];
                            $quantity = $_POST['quantity'];
                            $orderDate = $_POST['orderDate'];
                            $printDate = $_POST['printDate'];
                            $carrier = $_POST['carrier'];
                            $carrierContact = $_POST['carrierContact'];
                            $sortCenter = $_POST['sortCenter'];
                            $orderNo = $_POST['orderNo'];
                            $trackingNo = $_POST['trackingNo'];

                            $createQuery = "INSERT INTO deliveries (customerName, customerEmail, customerAddress, productName, productBrand, productPrice, productQty, orderDate, printDate, carrier, carrierContact, sortCenter, orderNo, trackingNo) 
                            VALUES ('$customerName', '$customerEmail', '$customerAddress', '$productName', '$productBrand', '$productPrice', '$quantity', '$orderDate', '$printDate', '$carrier', '$carrierContact', '$sortCenter', '$orderNo', '$trackingNo')";
                            mysqli_query($conn, $createQuery);

                            ?>
                                <script>
                                    $(document).ready(function() {
                                        $('#notifSuccess').modal('show')
                                        setTimeout(() => {
                                            window.location.href = '../Delivery Status/deliveryStatus.php'
                                        }, 1500);
                                    })
                                </script>
                            <?php
                    }
                ?>
        </div>
    </div>
    
    <!-- Modal Success -->
    <div class="modal fade" id="notifSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #4aff4d;">
                </div>
                <div class="modal-body">
                    Delivery created successfully!
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
    <!-- Data Tables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
    <!-- Sweet Alert
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

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

            $('.manageDelivery').on("click", function(e) {
                e.preventDefault()
                let id = $(this).val()
                $.ajax({
                    url: 'requestDetails.php',
                    method: 'post',
                    data: {id: id},
                    success: function(data) {
                        let arrayData = $.parseJSON(data)
                        $('#customerName').val(arrayData.name)
                        $('#customerEmail').val(arrayData.email)
                        $('#customerAddress').val(arrayData.address)
                        $('#productName').val(arrayData.request)
                    }
                })
            })
        })  
    </script>
</html>

