<html>
    <head>
        <title>Delete Vehicle</title>
        <style>
            body 
            {
                max-width: 400px;
                margin: auto;
                background-color: red;
                text-align: center;
            }
            form 
            {
                width: 150px;
                border: 15px solid palevioletred;
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
    <body>
        <centre>
            <form method="post" action="deletevehicle.php">
                <label>Select the Vehicle:</label>
                <select name="delveh">
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
                <input type="submit" name="submit" value="Delete Vehicle"><br>
                <input type="reset" name="reset" value="Clear Selection"><br>
                <a href="start.html" target="_self"><input type="button" value="BACK TO HOME" /></a>
            </form>
        </centre>
    </body>
</html>