<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring</title>

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

            <a href="../Client Request Status/clientRequestStatus.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client Request Status</a>

            <a href="../Client Request Status/acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="../Delivery Status/deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <a href="#" class="link">
            <i class="bi bi-bookmark-fill fs-5 text-white"></i>
            Monitoring</a>

            <a href="../Client Request Status/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Monitoring</span>
        
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
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">Client Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col" class="text-center">Delivery Status</th>
                    <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require('../../reusable.php');
                        include('../../notif.php');

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $deliveredDeleted = mysqli_query($conn, "DELETE FROM deliveries WHERE delivery_id = '$id'");
                        }
                
                        // Retrieving of data
                        $query = "SELECT * FROM delivered";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td id="id"><?php echo $row['delivery_id'];?></td>
                                    <td id="name"><?php echo $row['customerName'];?></td>
                                    <td id="email"><?php echo $row['productName'];?></td>
                                    <td id="delStatus" class="text-center"><?php echo $row['deliveryStatus'];?></td>
                                    <td style="display: flex; justify-content: center; column-gap: 8px">

                                    <button class="checkDelivery btn btn-success" value="" data-id="<?= $row['delivery_id'];?>" data-bs-toggle="modal" data-bs-target="#checkDelivery">
                                    Check
                                    </button>

                                    </td>
                                </tr>
                            <?php
                        }
                    ?>

                    <div class="modal fade" id="checkDelivery" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Client's Delivered Request Information</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="" method="POST" class="formDelivery row g-2" id="deliveryDetails">
                                        <div class="m-3 d-flex align-items-center">
                                            <label class="form-label">Order Date</label>
                                            <input type="date" name="orderDate" class="form-control w-25 border-secondary" style="margin-right: 1rem;" id="orderDate" readonly>

                                            <label class="form-label text-center">Expected Deliver Date</label>
                                            <input type="date" name="printDate" class="form-control w-25 border-secondary" id="printDate" readonly>

                                            <label class="form-label text-center">Delivery Status</label>
                                            <input type="text" name="deliveryStatus" class="form-control w-25 border-secondary" id="deliveryStatus" value="Delivered" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <!-- <label class="form-label">Carrier</label>
                                            <input type="text" name="delivery" class="form-control w-25 border-secondary" id="delivery" readonly> -->

                                            <label class="form-label" style="margin-right: 1rem;">Carrier</label>
                                            <select class="form-select border-secondary" name="carrier" style="width: 11rem;">
                                                <option>Ernesto Santos</option>
                                                <option>Two</option>
                                                <option>Three</option>
                                            </select>

                                            <label class="form-label text-center">Carrier Contact</label>
                                            <input type="number" name="carrierContact" class="form-control w-25 border-secondary" id="carrierContact" value="" readonly>

                                            <label class="form-label text-center">Sort Center</label>
                                            <input type="text" name="sortCenter" class="form-control w-25 border-secondary" id="sortCenter" value="" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label class="form-label" style="text-align: center">Order #</label>
                                            <input type="number" name="orderNo" class="form-control border-secondary" id="orderNo" value="" readonly>

                                            <label class="form-label" style="text-align: center">Tracking #</label>
                                            <input type="number" name="trackingNo" class="form-control border-secondary" id="trackingNo" value="" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="buyerAddress" class="form-label">Customer Name</label>
                                            <input type="text" name="customerName" class="form-control border-secondary" id="customerName" value="" readonly>
                                        
                                            <label for="customerAddress" class="form-label">Customer Address</label>
                                            <input type="text" name="customerAddress" class="form-control border-secondary" id="customerAddress" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="customerEmail" class="form-label text-center">Customer Email</label>
                                            <input type="text" name="customerEmail" class="form-control border-secondary" id="customerEmail" readonly>

                                            <label for="productName" class="form-label text-center">Product Name</label>
                                            <input type="text" name="productName" class="form-control border-secondary" id="productName" readonly>
                                        </div>

                                        <div class="m-3 d-flex align-items-center">
                                            <label for="productBrand" class="form-label text-center">Product Brand</label>
                                            <input type="text" name="productBrand" class="form-control border-secondary" id="productBrand" readonly>

                                            <label for="paidPrice" class="form-label">Price</label>
                                            <input type="number" name="productPrice" class="form-control border-secondary" id="productPrice" readonly>

                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control border-secondary" id="quantity" readonly>
                                        </div>

                                        <!-- <div class="col-12">
                                            <button type="submit" name="createDelivery" class="btn btn-primary float-end">Create Delivery</button>
                                        </div>     -->
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
            $('.checkDelivery').on("click", function(e) {
                e.preventDefault()
                const id = $(this).data('id')
                alert(id)
                $.ajax({
                    url: './details.php',
                    method: 'post',
                    data: {id: id},
                    success: function(data) {
                        console.log(data)
                    }, error: function(xhr, status) {
                        console.log(xhr.error, status.error)
                    }
                })
            })
        })
    </script>
</html>

