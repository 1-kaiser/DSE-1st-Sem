<?php
require('../../reusable.php');

    $id = $_POST['id'];
    
    $result = mysqli_query($conn, "SELECT * FROM clientrequestlist WHERE id = '$id'");
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <p>Name:<br /> <strong><?php echo $row['name']?></strong></p>
        <p>Email:<br /> <strong><?php echo $row['email']?></strong></p>
        <p>Contact:<br /> <strong><?php echo $row['contact']?></strong></p>
        <p>Address:<br /> <strong><?php echo $row['address']?></strong></p>
        <p>Request: <br /> <strong><?php echo $row['request']?></strong></p>
        <?php
    }
?>