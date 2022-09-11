<?php
    $iname=$_REQUEST['newproduct'];
    $con = mysqli_connect("localhost","root","","project");
    
    if(!$con)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    $sql="INSERT INTO products(pname) VALUES('$iname')";
    if(mysqli_query($con,$sql))
    {
        header('Location: start.html');
    }
    else
    {
        echo " Query error! ".mysqli_error($con);
    }
    mysqli_close($con);
?>
    