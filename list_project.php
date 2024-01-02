
<?php
// $file_path = 'Power-Generation.csv';
$file_path = 'gs://simple-app-1/Power_Generation.csv';
$data = [];
$file = fopen($file_path, 'r');
$skip = 0;

while (($data = fgetcsv($file, null,','))!== FALSE) {
    if($skip == 0) {
        echo '<tr>';
        for ($i = 0; $i < count($data); $i++) {
            echo '<th>'. $data[$i] . '</th>';
        }
        echo'</tr>';
        $skip++;
    } else { 
        echo '<tr>';
        for ($i = 0; $i < count($data); $i++) {
            echo '<td>'. $data[$i] . '</td>';
        }   
        
        echo'</tr>';
    }
}
?>