<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud Computing Project</title>   
    <style>
        h1 { 
            /* color:blube; */
            font-size: 30;
        }
        table {
            border-collapse: collapse;            
            width: 100%;
            margin-top: 10px;

        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
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
        }
        .add-button { 
            display: inline-block;
            padding: 5px 10px;
            background-color: #006400;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .edit-button { 
            display: inline-block;
            padding: 5px 10px;
            background-color: #0077cc;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .delete-button { 
            display: inline-block;
            padding: 5px 10px;
            background-color: #DB4035;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        /* .choices { 
            margin: 10px;
        } */
    </style> 

</head>

<body>
    <h1>MEKONG POWER GENERATION</h1>   
    <div class = "choices">
         <a href="list_project.php" class="add-button">List all project</a>
        <a href="add_project.php" class="add-button">Create new project</a>
        <a href="edit_project.php" class="edit-button">Edit</a>
        <a href="delete_project.php" class="delete-button">Delete</a>
    </div> 
    
    <div>
        <!-- <table>
      
        // $file_path = 'Power-Generation.csv';
        // $file_path = 'gs://simple-app-1/project.csv';
        // $data = [];
        // $file = fopen($file_path, 'r');
        // $skip = 0;

        // while (($data = fgetcsv($file, null,','))!== FALSE) {
        //     if($skip == 0) {
        //         echo '<tr>';
        //         for ($i = 0; $i < count($data); $i++) {
        //             echo '<th>'. $data[$i] . '</th>';
        //         }
        //         echo'</tr>';
        //         $skip++;
        //     } else { 
        //         echo '<tr>';
        //         for ($i = 0; $i < count($data); $i++) {
        //             echo '<td>'. $data[$i] . '</td>';
        //         }   
                
        //         echo'</tr>';
        //     }
        // }
        // ?>
        <!-- // </table> -->
    
    </div>
    
</body>
</html>