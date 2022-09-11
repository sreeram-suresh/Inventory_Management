<html>
    <head>
      <title>Warehouse Details</title>
        <style>
          body 
          {
              background-color: mediumpurple;
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
            width:400px;
          }
        </style>
    </head>
<?php

$con = mysqli_connect("localhost","root","","project");

if(!$con)
{
    die("Connection failed: ".mysqli_connect_error());
}
$selectSQL = "SELECT * FROM warehouse";

  if( !($selectRes=mysqli_query($con,$selectSQL)))
  {
    echo "Retrieval of data from Database Failed. ".mysqli_error($con);
  }
  else
  {
    ?>
    <caption>Warehouse Details</caption>
<table border="4">
    <tr>
      <th>Product</th>
      <th>Quantity</th>
    </tr>
  <tbody>
    <?php
      if(mysqli_num_rows($selectRes)==0)
      {
        echo "<tr><td colspan='2'> ----No Data available---- </td></tr>";
      }
      else
      {
        while($row=mysqli_fetch_assoc($selectRes))
        {
          echo "<tr><td>{$row['product']}</td><td>{$row['stock']}</td></tr>\n";
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