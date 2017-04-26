<?php 
$dados = [ 'salmão', 'tilápia', 'sardinha', 'badejo', 'pescada', 
           'dourado', 'corvina', 'cavala', 'bagre' ]; 
$objarray = new ArrayObject($dados); 

// acrescenta 
$objarray->append('bacalhau'); 

// obtém posição 2 
print 'Posição 2: ' . $objarray->offsetGet(2) . '<br>' . PHP_EOL; 

// substitui posição 2 
$objarray->offsetSet(2, 'linguado'); 
print 'Posição 2: ' . $objarray->offsetGet(2) . '<br>' . PHP_EOL; 

// elimina posição 4 
$objarray->offsetUnset(4); 

// testa se posição existe 
if ($objarray->offsetExists(10)) { 
    echo 'Posição 10 encontrada'. '<br>' . PHP_EOL; 
} else { 
    echo 'Posição 10 não encontrada'. '<br>' . PHP_EOL; 
} 
print 'Total: ' . $objarray->count(); 
$objarray[] = 'atum'; // acrescenta 
$objarray->natsort(); // ordena 

// percorre dados 
print  '<br>' . PHP_EOL; 
foreach ($objarray as $item) { 
    print 'Item: '.  $item . '<br>' . PHP_EOL; 
} 
print $objarray->serialize();