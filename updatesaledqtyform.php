<html>
    <head>
        <title>Updating EOD Sales</title>
        <style>
            fieldset
            {
                background-color: rgb(0, 140, 145);
                text-decoration-color: rgb(156, 20, 54);
                text-shadow: 2px;
                background-size: contain;
                text-align:center;
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
            body 
            {
                background-image: url('unloading.jpeg');
                background-size: contain;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <centre>
                <form method="post" action="updatesaledqty.php">
                    <label>Select date:</label>
                    <input type="date" name="date"><br><br>
                    <label>Enter vehicle number:</label>
                    <select name="vno">
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
                    <label>Enter product name:</label>
                    <select name="pname">
                        <option disabled selected>-- Select Product --</option>
                        <?php
                            $db = mysqli_connect("localhost","root","","project");
                
                            if(!$db)
                            {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                
                            $records = mysqli_query($db, "SELECT pname From products");
                    
                            while($data = mysqli_fetch_array($records))
                            {
                                echo "<option value='". $data['pname'] ."'>" .$data['pname'] ."</option>";
                            }
                            mysqli_close($db);	
                        ?>  
                    </select><br><br>
                    <label>Enter Saled quantity:</label>
                    <input type="text" name="slqty"><br><br>
                    <input type="submit" name="submit" value="Update EOD Saled quantity"><br><br>
                    <input type="reset" name="reset" value="Clear entries"><br><br>
                    <a href="start.html" target="_self"><input type="button" value="BACK TO HOME" /></a>
                </form>
            </centre>
        </fieldset>
    </body>
</html>