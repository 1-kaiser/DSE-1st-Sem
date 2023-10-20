<?php

    $scriptUrl = "https://script.google.com/macros/s/AKfycbwWg-Ol9-8hgIdhHV8B7mwYi6XavUzLPpBfLj2wxQ6kwWTxslKG2n7N9myLPtLxllKI/exec";
      $limit  = 5; //data show per page
      $offset = 0; //start from

      $data = array(
         "action" => "inboxList",
         "limit"  => $limit,
         "offset" => $offset
      );

      $ch = curl_init($scriptUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      $result = curl_exec($ch);
      $result = json_decode($result, true); 
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Request List</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>

    <h1>Client Request List</h1>
    <table width="500" border="1">
        <tr>
            <td>From</td>
            <td>Subject</td>
            <td>Date</td>
        </tr>
    </table>
    
</body>
</html>