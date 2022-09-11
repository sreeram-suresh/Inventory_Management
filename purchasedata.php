<html>
    <head>
      <title>Details</title>
        <style>
          body 
          {
              background-color: khaki;
              text-decoration-color: darkred;
              text-align: center;
          }
          table
          {
            margin-left: auto;
            margin-right: auto;
          }
          tr
          {
            height:50px;
            width:150px;
          }
        </style>
    </head>
<?php

$veh=$_REQUEST['vehicle'];
$con = mysqli_connect("localhost","root","","project");

if(!$con)
{
    die("Connection failed: ".mysqli_connect_error());
}
$selectSQL = "SELECT * FROM purchase WHERE vehicleno like '$veh' order by DATE desc";

  if( !($selectRes=mysqli_query($con,$selectSQL)))
  {
    echo "Retrieval of data from Database Failed. ".mysqli_error($con);
  }
  else
  {
    ?>
    <caption>Purchase Details</caption>
<table border="2">
    <tr>
      <th>Date</th>
      <th>Vehicle Number</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>UOM</th>
      <th>Quantity Saled</th>
      <th>Quantity Reamining</th>
    </tr>
  <tbody>
    <?php
      if(mysqli_num_rows($selectRes)==0)
      {
        echo "<tr><td colspan='7'> ----No Data available---- </td></tr>";
      }
      else
      {
        while($row=mysqli_fetch_assoc($selectRes))
        {
          echo "<tr><td>{$row['date']}</td><td>{$row['vehicleno']}</td><td>{$row['product']}</td><td>{$row['qty']}</td><td>{$row['uom']}</td><td>{$row['qtysaled']}</td><td>{$row['qtyremaining']}</td></tr>\n";
        }
      }
    ?>
  </tbody>
</table>
    <?php
  }
  mysqli_close($con);
?>
</html>