<?php
require('../../reusable.php');

    if (isset($_GET['id'])) {
        
        $id = $_GET['id'];
        $delRes = mysqli_query($conn, "DELETE FROM archive WHERE id = '$id'");
        echo "<script>
        alert('Deleted Successfully')
        window.location.href = './archive.php'</script>";
    }
    
?>