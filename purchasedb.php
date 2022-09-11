<!-- php file to read data from purchaseform to enter into db -->
<?php
$date=$_REQUEST['date'];
$regno=$_REQUEST['vehicle'];
$item=$_REQUEST['product'];
$qty=$_REQUEST['qty'];
$uom=$_REQUEST['uom'];

$con = mysqli_connect("localhost","root","","project");

if(!$con)
{
    die("Connection failed: ".mysqli_connect_error());
}

    $sl="SELECT stock FROM warehouse WHERE product like '$item'";
    if($res=mysqli_query($con,$sl))
    {
        $ch=mysqli_fetch_assoc($res);
        if($qty<=$ch["stock"])
        {
            $sql = "INSERT INTO purchase (date,vehicleno,product,qty,uom) VALUES('$date','$regno','$item',$qty,'$uom')";
            if(mysqli_query($con,$sql))
            {
                $ql2= "UPDATE warehouse SET stock=stock-$qty WHERE product='$item'";
                if(mysqli_query($con,$ql2))
                {
                    header('Location: start.html');
                }
            }
            else
            {
                echo "Couldn't register the purchase ".mysqli_error($con);
            }
        }
        else
        {
            echo"Can't make purchase with so much quantity";
        }
    }
mysqli_close($con);
?>
