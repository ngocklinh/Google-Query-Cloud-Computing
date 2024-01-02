<html>
    <head>
        <style>
            * {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            table {
                border-collapse: collapse;            
                width: 100%;
                margin-top: 20px;
                margin-bottom: 20px;

            }

            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                font-size: 14px;
            }
            td {
                border-right: 1px solid #ddd;
                }

            /* Add border to last cell of each row */
            td:last-child {
                border-right: none;
            }
            th {
                background-color: #0077cc;
                color: #fff;
                font-weight: light;
                font-size: 14px;
            }
            p { 
                font-style: italic;
                text-align: center;
            }
            .message { 
                font-size: 17px;
                font-weight: bold;
            }
            h2 {         
                margin-top: 20px;        
                size: 25px;
                color: #0077cc;
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
                font-weight: light;
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
                background-color:#0077cc;
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
    <h2>
        UPDATE PROJECT
    </h2>
    <form action="edit_project.php" method = "POST">
    <p>After submit, the system will print message at the end of page.</p><br>
        <label for="name">Please enter EXACT name of the project 
            (System cannot find the project without exact full name)</label><br>
        <input type="text" id="iput" name = "input">
        <input type="submit" name = "search" value="Search">
    </form>
    </body>
    
</html>

<?php
    // $file_path = "Power-Generation.csv";
    $file_path = 'gs://simple-app-1/project.csv';

    if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['search'])) { 
        search();
    }
    function search() {
        global $file_path;
        $edit_input = $_POST['input'];
        $file =fopen($file_path, 'r');
        $data =[];
        while(($row = fgetcsv($file,null,','))!== FALSE) {
            $data[] = $row;
        }
        fclose($file);
        $rowToEdit = -1;
        if ($edit_input == '' ) {
            $rowToEdit = -1;
        }
        for ($i=0; $i<count($data); $i++) {
            if ($data[$i][0] == $edit_input) {
                $rowToEdit = $i;
                break;
            }
        }
        if($rowToEdit != -1) { 
            // return true;
            echo 'Found project with given information:';
            echo '<table>';
            echo '<tr>';
            for ($i =0; $i < count($data[0]); $i++) { 
                echo '<th>' . $data[0][$i] . '</td>';
            }
            echo '</tr>';
            echo '<tr>';
            for ($i =0; $i < count($data[$rowToEdit]); $i++) { 
                echo '<td>' . $data[$rowToEdit][$i] . '</td>';
            }
            echo '</tr>';
            echo ' </table>';
            echo '<form action="edit_project.php" method="POST">
            <p>After submit, the system will print message at the end of page.</p><br>
            
            <label for="old_name">Current project name (must be exact):</label>
            <input type="text" id="old_name" name="old_name" ><br>

            <label for="new_name">New project name (Retype if not change):</label>
            <input type="text" id="new_name" name="new_name" ><br>

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

            <input type = "submit" name = "submit" value="Submit" />';
            
        } else {
            echo 'Cannot find the project with the name typed. Please check the list again for exact name.';
            return false;
        }
    }
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])) {
            global $file_path;
            $edit_input = $_POST['old_name'];
            $file =fopen($file_path, 'r');
            $data =[];
            while(($row = fgetcsv($file,null,','))!== FALSE) {
                $data[] = $row;
            }
            fclose($file);
            $rowToEdit = -1;
            if ($edit_input == '' ) {
                $rowToEdit = -1;
            }
            for ($i=0; $i<count($data); $i++) {
                if ($data[$i][0] == $edit_input) {
                    $rowToEdit = $i;
                    break;
                }
            }
            $new_name = $_POST["new_name"];
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
            
            if ($rowToEdit != -1) {
                if ($new_name =="") {
                    echo "Name cannot be blank";
                } else {
                    $data[$rowToEdit] = array (
                        $new_name,
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
                    echo 'Successfully update the record with input information.';
                    // test();
                // }
                }
            } else { 
                echo "Wrong current name of project. Try again";
            }
            
            $file = fopen($file_path, 'w');
            foreach($data as $row) {
                fputcsv($file,$row);
            }
    
            fclose($file);
        }  

        
    
    // function test() {
    //     echo 'I am so tired';
    // }
?>