<?php
    $uname=$_REQUEST['username'];
    $pd=$_REQUEST['password'];
    $con = mysqli_connect("localhost","root","","project");
    
    if(!$con)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    $sl="INSERT INTO users(username,password) VALUES('$uname','$pd') ";
    if(mysqli_query($con,$sl))
    {
        header('Location: index.html');  
    }
    else
    {
        echo " Couldn't Register! ".mysqli_error($con);
    }
    mysqli_close($con);
?>