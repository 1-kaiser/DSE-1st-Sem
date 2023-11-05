<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Product</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../css/findProduct.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="../../css/bootstrap-icons-1.11.1/bootstrap-icons.min.css">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            <a href="./clientRequestList.php" class="link">
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
        <span class="greet">Client Request Product</span>
        <a href="" class="manage btn-btn-success">
        <i class="bi bi-person-fill-gear"></i>
        <span>Manage Your Account</span>
        </a>
    </div>

    <div class="shops-wrapper">

        <div class="shop-group">
            <div class="shop-container">
                <img src="../../css/shops/alibaba.png" class="shop-img">
                <a href="http://alibaba.com" style="text-decoration: none;" class="btn btn-primary" target="_blank">Alibaba</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/amazon.png" class="shop-img">
                <a href="https://www.amazon.com/" style="text-decoration: none;" class="btn btn-primary" target="_blank">Amazon</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/easypc.png" class="shop-img">
                <a href="https://easypc.com.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">Easy PC</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/ebay.png" class="shop-img">
                <a href="https://www.ebay.com/" style="text-decoration: none;" class="btn btn-primary" target="_blank">eBay</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/ikea.png" class="shop-img">
                <a href="https://www.ikea.com/" style="text-decoration: none;" class="btn btn-primary" target="_blank">IKEA</a>
            </div>


        </div>

        <div class="shop-group">
            
            <div class="shop-container">
                <img src="../../css/shops/pcexpress.png" class="shop-img">
                <a href="https://pcx.com.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">PC Express</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/gearbest.png" class="shop-img">
                <a href="https://pcx.com.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">GearBest</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/lazada.png" class="shop-img">
                <a href="https://pcx.com.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">Lazada</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/bestbuy.png" class="shop-img">
                <a href="https://pcx.com.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">BestBuy</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops//shopee.png" class="shop-img">
                <a href="https://pcx.com.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">Shopee</a>
            </div>
        </div>

    </div>

</body>
    <!-- Bootstrap CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</html>