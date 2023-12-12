<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivered Details</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/deliveryStatus.css">
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

            <a href="./deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <!-- <a href="../Monitoring/monitoring.php" class="link">
            <i class="bi bi-bookmark-fill fs-5 text-white"></i>
            Monitoring</a> -->

            <a href="../Client Request Status/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Delivery Status</span>
        
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
            <div class="saveToImage">

                <hr style="width: 50rem; margin: 0 0 0 4rem; border: 1px solid black;">

                <div class="paperTitle d-flex" style="margin: 1rem 0 0 4rem;">
                    <img src="../../css/dito.png" style="width: 3rem; margin: 0 10px 0 0;">
                    <div class="paperTitleText d-flex flex-column justify-content-center" style="font-size: 13px;">
                    <span>DITO LMISCTNA</span>
                    <span>Innovation and Technology Office</span>
                    </div>
                    <div class="lasalle" style="font-size: 13px; display: flex; margin: 4px 0 0 23.7rem;">
                        <span>De La Salle University-Manila</span>
                    </div>
                </div>

                <hr style="width: 50rem; margin: 1rem 0 0 4rem; border: 1px solid black;">

                <div class="tablePaperContainer" style="margin: 1rem 0 0 6rem; width: 85%;">
                    <table class="table" style="border: 1px solid black;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Product Brand</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                            </tr>   
                        </thead>

                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>

                </div>



            </div>
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

    <!-- <script>
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

