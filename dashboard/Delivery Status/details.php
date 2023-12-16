<?php
    use Mpdf\Mpdf;
    require_once __DIR__ . '/vendor/autoload.php';
    require('../../reusable.php');
    include('../../notif.php');

    if (isset($_GET['delivery_id'])) {
        $id = $_GET['delivery_id'];

        $result = mysqli_query($conn, "SELECT * FROM deliveries WHERE delivery_id = '$id'");
        $row = mysqli_fetch_assoc($result);

        $productName = $row['productName'];
        $productBrand = $row['productBrand'];
        $productPrice = $row['productPrice'];
        $productQuantity = $row['productQty'];
        
        // Mpdf
        $mpdf = new \Mpdf\Mpdf([
            'default_font' => 'san-serif',
            'chroot' => __DIR__
        ]);

        $mpdf->SetAuthor("DITO");
        $mpdf->SetHeader('{PAGENO}');
        $mpdf->SetFooter('Copyright © 2023 DITO LMISCITNA - Group 5');

        $html .= "
            <img src='../../css/dito.png' style='width: 2rem; float:'/>
            <p style='font-size: 10px; position: absolute; left: 6.5rem; top: 3.6rem;'>Innovation and Technology Office</p>
            <p style='font-size: 10px; position: absolute; left: 41.3rem; top: 3.6rem;'>De La Salle University-Manila</p>
            <hr style='width: 100%; color: black; height: .5px;'/>
            ";

            $html .= "<h1 style='font-size: 1.5rem'>Client's Delivered Package Record</h1>";
            $html .= "<p style='font-size: 14px'> Name: ". $row['customerName'] ."</p>";
            $html .= "<p style='font-size: 14px'> Email: ". $row['customerEmail'] ."</p>";
            $html .= "<p style='font-size: 14px'> Address: ". $row['customerAddress'] ."</p>";

            $html .= "<table style='border: 1px solid black; width: 100%; border-collapse: collapse;'>";
            $html .= "<tr>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Product Name</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Product Brand</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Quantity</th>";
                $html .= "<th style='border:1px solid black; padding: 10px;'>Price</th>";
            $html .= "</tr>";
            
                $html .= "<tr>";
                $html .= '<td style="text-align: center; border:1px solid black; padding: 10px;">'. $row['productName'] .'</td>';
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $row['productBrand'] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $row['productQty'] ."</td>";
                $html .= "<td style='text-align: center; border:1px solid black; padding: 10px;'>". $row['productPrice'] ."</td>";
                $html .= "</tr>";
            
            $html .= "</table>";


                $subTotal *= $row['productQty'];
                // $subTotal += $subTotal;

            $html .= "<p style=''>Total:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;&ensp;&ensp;" .$subTotal. "</p>";

            $html .= "<p style='font-size: 14px'> Order Date: ". $row['orderDate'] ."</p>";
            $html .= "<p style='font-size: 14px'> Expected Delivery Date: ". $row['printDate'] ."</p>";
            $html .= "<p style='font-size: 14px'> Carrier: ". $row['carrier'] ."</p>";
            $html .= "<p style='font-size: 14px'> Carrier Contact: ". $row['carrierContact'] ."</p>";
            $html .= "<p style='font-size: 14px'> Sort Center: ". $row['sortCenter'] ."</p>";
            $html .= "<p style='font-size: 14px'> Order #: ". $row['orderNo'] ."</p>";
            $html .= "<p style='font-size: 14px'> Tracking #: ". $row['trackingNo'] ."</p>";
            $html .= "<p style='font-size: 14px'> Delivery Status: ". $row['deliveryStatus'] ."</p>";

            $mpdf->WriteHTML($html);
            $mpdf->Output($row['customerName'].' - Client-Delivered-Package-Record.pdf', 'I');

            
    }
    
    ?>