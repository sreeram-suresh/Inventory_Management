<html>
    <head>
        <title>Update warehouse stock</title>
        <style>
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
            fieldset
            {
                background-color: goldenrod;
                text-decoration-color: indigo;
                text-shadow: 2px;
                background-size: contain;
                text-align:center;
            }
            body 
            {
                background-image: url('warehouse.jpeg');
                background-size: contain;
            }
        </style>
    </head>
    <body>
        <fieldset>
            <centre>
                <form method="post" action="updatewarehousedb.php">
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
                    <label>Enter the quantity to add:</label>
                    <input type="text" name="addqty"><br><br>
                    <input type="submit" name="submit" value="Add stock to warehouse"><br><br>
                    <input type="reset" name="reset" value="Clear entries"><br><br>
                    <a href="start.html" target="_self"><input type="button" value="BACK TO HOME" /></a>
                </form>
            </centre>
        </fieldset>    
    </body>
</html>