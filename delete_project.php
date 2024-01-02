<html>
    <head>
        <style>
            * {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            p { 
                font-style: italic;
                text-align: center;
            }
            h2 {         
                margin-top: 20px;        
                size: 25px;
                color: #DB4035;
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
                background-color:#DB4035;
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
        DELETE PROJECT
    </h2>
    <form onsubmit ="return confirm('Do you really want to delete the project?');"action="delete_project.php" method = "POST">
    <p>After submit, the system will print message at the end of page.</p><br>
        <label for="name">Please enter EXACT name of the project 
            (System cannot find the project without exact full name)</label><br>
        <input type="text" id="name" name = "name">
        <input type="submit" name = "submit" value="Submit">
    </form>
    </body>
    
</html>

<?php
    // $file_path = "Power-Generation.csv";
    $file_path = 'gs://simple-app-1/project.csv';

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])) {
        delete();
    }

    function delete() {
        global $file_path;
        $delete_input = $_POST["name"];
        $file = fopen($file_path, 'r');
        $data = [];
        while (($row = fgetcsv($file, null, ',')) !== FALSE) {
            $data[] = $row;
        }

        fclose($file);
        $rowToDelete = -1;
        for ($i =0; $i < count($data); $i++) { 
            if ($data[$i][0] == $delete_input) { 
                $rowToDelete = $i;
                break;
            }
        }

        if ($rowToDelete != -1) { 
            // echo '<form method="POST">';
            // echo '<input type="hidden" name="id" value="id">';
            // echo '<label>Are you sure you want to delete this record?</label>';
            // echo '<button type="submit" name="confirm-delete">Yes</button>';
            // echo '<button type="button" onclick="history.back()">No</button>';
            // echo '</form>';
            // if(isset($_POST['confirm-delete'])) {                
                unset($data[$rowToDelete]);
                echo "<p>Successully delete the record</p>";
            // }
            
        } else { 
            echo "Cannot find the project with name input! Please see the list for exact project's name.";
        }

        $file = fopen($file_path, 'w');
        foreach ($data as $row) { 
            fputcsv($file, $row);
        }

        fclose($file);
    }
?>