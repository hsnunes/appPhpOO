<?php 
$dir = opendir('/tmp'); 
while ($arquivo = readdir($dir)) { 
    print $arquivo . '<br>' . PHP_EOL; 
} 
closedir($dir);