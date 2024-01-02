<html>
    <head>
        <style>
            * {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            p { 
                font-style: italic;

            }
            h2 {         
                margin-top: 20px;        
                size: 25px;
                color: #006400;
                text-align: center;
            }
            form {
                max-width: 500px;
                margin: 0 auto;
                border: 1px solid #ccc;
                padding: 20px;
                border-radius: 5px;
            }

            /* Style for the labels */
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            /* Style for the input elements */
            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 3px;
            }

            /* Style for the submit button */
            input[type="submit"] {
                width: 100%;
                background-color: #0077cc;
                color: #fff;
                border: none;
                padding: 10px 0px;
                text-align: center;
                font-size: 18px;
                border-radius: 3px;
                cursor: pointer;
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
        <h2>CREATE A NEW PROJECT</h2>
        <form action="add_project.php" method="POST">
            <p>After submit, the system will print message at the end of page.</p><br>
            <label for="name">Project name:</label>
            <input type="text" id="name" name="name" ><br>

            <label for="type">Subtype:</label>
            <input type="text" id="type" name="type" ><br>

            <label for="status">Current status:</label>
            <input type="text" id="status" name="status" ><br>

            <label for="capacity">Capacity(MW):</label>
            <input type="text" id="capacity" name="capacity" ><br>
            
            <label for="year">Year of completion:</label>
            <input type="text" id="year" name="year" ><br>

            <label for="sponsors_country">Country list of Sponsor/Developer (use ; for seperating):</label>
            <input type="text" id="sponsors_country" name="sponsors_country" ><br>

            <label for="sponsor_company">Sponsor/Developer Company:</label>
            <input type="text" id="sponsor_company" name="sponsor_company" ><br>

            <label for="lenders_country">Country list of Lender/Financier (use ; for seperating):</label>
            <input type="text" id="lenders_country" name="lenders_country" ><br>    
            
            <label for="lender_company">Lender/Financier Company:</label>
            <input type="text" id="lender_company" name="lender_company" ><br>

            <label for="construct_country">Country list of Construction/EPC (use ; for seperating):</label>
            <input type="text" id="construct_country" name="construct_country" ><br>   

            <label for="construction_company">Construction Company/EPC Participant:</label>
            <input type="text" id="construction_company" name="construction_company" ><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country" ><br>

            <label for="province">Province/State:</label>
            <input type="text" id="province" name="province" ><br>

            <label for="district">District:</label>
            <input type="text" id="district" name="district" ><br>

            <input type = "submit" name = "submit" value="Submit" />
        </form>
    </body>
</html>


<?php
    // $file_path = 'Power-Generation.csv';
    $file_path = 'gs://simple-app-1/project.csv';


    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
    {
        create();
    }
    function create()
    {
        global $file_path;
    // do stuff  
        $name = $_POST["name"];
        $type = $_POST["type"];
        $status = $_POST["status"];
        $capacity = $_POST["capacity"];
        $year = $_POST["year"];
        $sponsors_country = $_POST["sponsors_country"];
        $sponsor_company = $_POST["sponsor_company"];
        $lenders_country = $_POST["lenders_country"];
        $lender_company = $_POST["lender_company"];
        $construct_country = $_POST["construct_country"];
        $construction_company = $_POST["construction_company"];
        $country = $_POST["country"];
        $province = $_POST["province"];
        $district = $_POST["district"];    
        
        if ($name == "") { 
            echo '<p>Name of the project must be filled.</p>';
        } else { 
            $file = fopen($file_path, 'a');
            $data = array(                
                $name,
                $type,
                $status,
                $capacity,
                $year,
                $sponsors_country,
                $sponsor_company,
                $lenders_country ,
                $lender_company,
                $construct_country ,
                $construction_company,
                $country, 
                $province,
                $district
            );
            // fputcsv($file, []);
            fputcsv($file, $data);
            fclose($file);    
            echo "<script>";
            echo "alert('Successfully saved to the list!');";
            echo "</script>";
        }
    }
?>
