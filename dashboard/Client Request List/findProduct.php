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

            <a href="../Client Request List/clientRequestList.php" class="link">
            <i class="bi bi-question-octagon fs-5 text-white"></i>
            Client Request List</a>

            <a href="../Client Request Status/clientRequestStatus.php" class="link">
            <i class="bi bi-clock-history fs-5 text-white"></i>
            Client Request Status</a>

            <a href="../Delivery Status/deliveryStatus.php" class="link">
            <i class="bi bi-truck fs-5 text-white"></i>
            Delivery Status</a>

            <a href="../Client Request Status/acceptedRequest.php" class="link">
            <i class="bi bi-check2-circle fs-5 text-white"></i>
            Accepted Request</a>

            <a href="../Client Request Status/archive.php" class="link">
            <i class="bi bi-archive-fill fs-5 text-white"></i>
            Archive</a>
            
        </div>
    </div>

    <div class="greet-msg">
        <span class="greet">Client Request Product</span>
        
        <!-- Dropdown -->
        <div class="dropdown" style="margin-right: 18px;">
            <a class="btn btn-warning dropdown-toggle btn-sm w-100 h-25" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-fill-gear"></i> Admin
            </a>

            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="../manageAccount.php" style="font-size: 14px;">
                <i class="bi bi-people-fill" style="margin-right: 1rem;"></i>Manage Account</a></li>
                <li><a class="dropdown-item" href="../logout.php" style="font-size: 14px;">
                <i class="bi bi-box-arrow-right" style="margin-right: 1rem;"></i>Logout</a></li>
            </ul>
        </div>
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
                <a href="https://gearbest.net/" style="text-decoration: none;" class="btn btn-primary" target="_blank">GearBest</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/lazada.png" class="shop-img">
                <a href="https://www.lazada.com.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">Lazada</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops/bestbuy.png" class="shop-img">
                <a href="https://www.bestbuy.com/" style="text-decoration: none;" class="btn btn-primary" target="_blank">BestBuy</a>
            </div>

            <div class="shop-container">
                <img src="../../css/shops//shopee.png" class="shop-img">
                <a href="https://shopee.ph/" style="text-decoration: none;" class="btn btn-primary" target="_blank">Shopee</a>
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