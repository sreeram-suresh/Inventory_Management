<?php
$item=$_REQUEST['product'];
$qty=$_REQUEST['addqty'];

$con = mysqli_connect("localhost","root","","project");

if(!$con)
{
    die("Connection failed: ".mysqli_connect_error());
}
    $sql = "UPDATE warehouse SET stock=stock+$qty WHERE product like '$item' ";
    if(mysqli_query($con,$sql))
    {
        header('Location: start.html');
    }
    else
    {
        echo "Couldn't register the purchase ".mysqli_error($con);
    }
mysqli_close($con);
?>
