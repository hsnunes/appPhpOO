<?php 
require_once 'classes/CSVParser.php'; 
$csv = new CSVParser('clientes.csv', ';'); 
$csv->parse(); 

while ($row = $csv->fetch()) 
{ 
    print $row['Cliente'] . " - "; 
    print $row['Cidade'] . "<br>\n"; 
} 