<?php
    $iveh=$_REQUEST['delveh'];
    $con = mysqli_connect("localhost","root","","project");
    
    if(!$con)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    $sql="DELETE FROM vehicles WHERE number='$iveh' ";
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