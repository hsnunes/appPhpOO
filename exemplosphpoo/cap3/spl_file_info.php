<?php 
$file = new SplFileInfo('spl_file_info.php'); 
print 'Nome: ' . $file->getFileName() . '<br>' . PHP_EOL; 
print 'Extensão: ' . $file->getExtension() . '<br>' . PHP_EOL; 
print 'Tamanho: ' . $file->getSize() . '<br>' . PHP_EOL; 
print 'Caminho: ' . $file->getRealPath() . '<br>' . PHP_EOL; 
print 'Tipo: ' . $file->getType() . '<br>' . PHP_EOL; 
print 'Gravação: ' . $file->isWritable() . '<br>' . PHP_EOL;