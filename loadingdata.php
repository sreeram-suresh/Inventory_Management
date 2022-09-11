<html>
    <head>
        <title>Purchase details by VEHICLENO</title>
        <style>
            body 
            {
                max-width: 400px;
                margin: auto;
                background-color: pink;
                text-align: center;
            }
            form 
            {
                width: 150px;
                border: 15px solid maroon;
                padding: 50px;
                margin: 60px;
            }
            input[type=button], input[type=submit], input[type=reset]
            {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 16px 32px;
                text-decoration: none;
                margin: 4px 2px;
                cursor: pointer;
                width: 100%;
            }
        </style>
    </head>
    <centre>
    <caption><marquee>Select Vehicle for viewing the details of purchase.</marquee></caption>
        <form method="POST" action="purchasedata.php">
            <label>Select Vehicle</label>
            <select name="vehicle">
                        <option disabled selected>-- Select Vehicle --</option>
                        <?php
                        $db = mysqli_connect("localhost","root","","project");

                        if(!$db)
                        {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                            $records = mysqli_query($db, "SELECT number From vehicles");
                    
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['number'] ."'>" .$data['number'] ."</option>";
                            }
                            mysqli_close($db);	
                        ?>  
                    </select><br><br>
            <input type="submit" name="submit" value="GET DETAILS"><br><br>
            <input type="reset" name="reset" value="CLEAR"><br><br>
            <a href="start.html" target="_self"><input type="button" value="BACK TO HOME" /></a>
        </form>
    </centre>
</html>
