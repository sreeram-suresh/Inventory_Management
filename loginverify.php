<?php
    $uname=$_REQUEST['username'];
    $psd=$_REQUEST['password'];
    $con = mysqli_connect("localhost","root","","project");
    
    if(!$con)
    {
        die("Connection failed: ".mysqli_connect_error());
    }
    $sl="SELECT password FROM users WHERE username='$uname' ";
    if($res=mysqli_query($con,$sl))
    {
        $ch=mysqli_fetch_assoc($res);
        if($psd==$ch["password"])
        {
            header('Location: start.html');  
        }
    }
    else
    {
        echo " Query error! ".mysqli_error($con);
    }
    mysqli_close($con);
?>