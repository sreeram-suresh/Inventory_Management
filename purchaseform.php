<!-- Form for Entering values into purchase table except qty.saled and qty.remaining -->
<html>
    <head>
        <title>Stock Purchase Entry</title>
        <style>
            fieldset
            {
                background-color: firebrick;
                text-decoration-color: wheat;
                text-shadow: 2px;
                background-size: contain;
                text-align:center;
            }
            body
            {
                background-image: url('loading.jpeg');
                background-size: contain;
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
        <fieldset>
            <centre>
                <form method="post" action="purchasedb.php">
                    <label>Date </label>
                    <input type="datetime-local" name="date"><br><br>
                    <label>Select Vehicle </label>
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
                    <label>Select Product </label>
                    <select name="product">
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
                    <label>Quantity:</label>
                    <input type="text" name="qty"><br><br>
                    <label>UOM:</label>
                    <input type="text" name="uom"><br><br>
                    <input type="submit" name="submit" value="Register purchase"><br><br>
                    <input type="reset" name="reset" value="Clear entries"><br><br>
                    <a href="start.html" target="_self"><input type="button" value="BACK TO HOME" /></a>
                </form>
            </centre>
        </fieldset>    
    </body>
</html>