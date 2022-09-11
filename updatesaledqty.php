<?php
$date=$_REQUEST['date'];
$reno=$_REQUEST['vno'];
$pnme=$_REQUEST['pname'];
$sldno=$_REQUEST['slqty'];
$con = mysqli_connect("localhost","root","","project");

if(!$con)
{
    die("Connection failed: ".mysqli_connect_error());
}
    $sql = "UPDATE purchase SET qtysaled='$sldno' WHERE CAST(date AS DATE) like '$date' and vehicleno like '$reno' and product like '$pnme' ";
    if(mysqli_query($con,$sql))
    {
        $sql2= "UPDATE purchase SET qtyremaining=qty-qtysaled WHERE CAST(date AS DATE) like '$date' and vehicleno like '$reno' and product like '$pnme'";
        if(mysqli_query($con,$sql2))
        {
            $s="SELECT qtyremaining FROM purchase WHERE product like '$pnme' AND vehicleno like '$reno' AND CAST(date AS DATE) like '$date'";
            if($d=mysqli_query($con,$s))
            {                  
                
                $f=mysqli_fetch_assoc($d);
                $vde=$f['qtyremaining'];
                $ql2= "UPDATE warehouse SET stock=stock+'$vde' WHERE product like '$pnme'";
                if(mysqli_query($con,$ql2))
                {

                    header('Location: start.html');
                }
                else
                {
                    echo"Couldn't Update the stock in warehouse. ".mysqli_error($con);
                }
            }
            else
            {
                echo" Error.".mysqli_error($con);
            }
        }
        else
        {
            echo"error.".mysqli_error($con);
        }
    }
    else
    {
        echo "Couldn't register the purchase ".mysqli_error($con);
    }

mysqli_close($con);
?>