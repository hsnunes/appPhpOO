<?php 
$file = new SplFileObject('spl_file_object2.php'); 
 
print 'forma 1: ' . PHP_EOL; 
while (!$file->eof()) { 
    print 'linha: ' . $file->fgets(); 
} 
print PHP_EOL.PHP_EOL; 

print 'forma 2: ' . PHP_EOL; 
foreach ($file as $linha => $conteudo) { 
    print "$linha: $conteudo"; 
}	