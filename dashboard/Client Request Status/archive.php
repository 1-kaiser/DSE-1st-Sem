<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../../css/archive.css">
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

            <a href="../Client Request Status/acceptedRequest.php" class="link">
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
        <span class="greet">Archive</span>
        
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

                        if (isset($_GET['id'])) {

                            $deniedId = $_GET['id'];

                            $deniedQuery = "INSERT INTO archive (id, archiveName, archiveEmail, archiveContact, archiveRequest) SELECT id, name, email, contact, request FROM clientrequestlist WHERE id = '$deniedId'";
                            
                            if (mysqli_query($conn, $deniedQuery)) {

                                $deleteQuery = "DELETE FROM clientrequestlist WHERE id = '$deniedId'";

                                if (mysqli_query($conn, $deleteQuery)) {
                                    ?>
                                    <script>
                                        Swal.fire({
                                        title: "The request has been sent to archive.",
                                        icon: "success"
                                        });
                                    </script>
                                    <?php
                                }
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                        }

                        $query = "SELECT * FROM archive";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td id="id"><?php echo $row['id'];?></td>
                                    <td id="name"><?php echo $row['archiveName'];?></td>
                                    <td id="email"><?php echo $row['archiveEmail'];?></td>
                                    <td id="contact"><?php echo $row['archiveContact'];?></td>
                                    <td style="display: flex; justify-content: center; column-gap: 8px">

                                        <a href="./restoreFunc.php?id=<?php echo $row['id'];?>" class="btn btn-primary">
                                        <i class="bi bi-skip-backward"></i>
                                        </a>

                                        <a href="./deleteFunc.php?id=<?php echo $row['id'];?>" class="btn btn-danger deleteButton">
                                        Delete Permanently
                                        </a>
                                        <!-- <button class="btn btn-danger deleteButton" name="delete" data-id="<?php echo $row['id'];?>">
                                        Delete Permanently</button> -->
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
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
                    Record deleted successfully!
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

            $('.deleteButton').on("click", function(e) {
                e.preventDefault()

                const href = $(this).attr('href')

                    Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.value) {
                            $('#notifSuccess').modal('show')
                            setTimeout(() => {
                                document.location.href = href
                            }, 1500);
                        }
                    })
            })

        })
        
    </script>

    <!-- <script>
        $(document).ready(function() {

            $('.deleteButton').click(function() {
                let id = $(this).data('id')
                $.ajax({
                    url: 'deleteFunc.php',
                    type: 'POST',
                    data: {
                        id: id,
                        
                    },
                    success: function(response) {
                        alert("Deleted Successfully")
                        window.location.href = "./archive.php";
                    },
                    error: function(error) {
                        console.log('Error:', error);
                    }
                    
                })
            })
        })
    </script> -->
</html>

