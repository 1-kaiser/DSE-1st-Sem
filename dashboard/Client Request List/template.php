<?php

  require('../../reusable.php');

  $id = $_GET['id'];
  $query = "SELECT * FROM clientform WHERE id = $id";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <h1>Request Confirmation</h1>
    <p>Name: <strong>{{ name }}</strong></p>
    <p>Email: <strong>{{ email }}</strong></p>
    <p>Contact: <strong>{{ contact }}</strong></p>
    <table
      style="border: 1px solid black; width: 50rem; border-collapse: collapse">
      <thead>
        <tr>
          <th
            style="border: 1px solid black; border-collapse: collapse"
            scope="col">
            Product Name
          </th>
          <th style="border: 1px solid black; border-collapse: collapse">
            Product Price
          </th>
          <th style="border: 1px solid black; border-collapse: collapse">
            Product Quantity
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td
            style="
              border: 1px solid black;
              border-collapse: collapse;
              text-align: center;
            ">
            {{ productName }}
          </td>
          <td
            style="
              border: 1px solid black;
              border-collapse: collapse;
              text-align: center;
            ">
            {{ productPrice }}
          </td>
          <td
            style="
              border: 1px solid black;
              border-collapse: collapse;
              text-align: center;
            ">
            {{ productQuantity }}
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
