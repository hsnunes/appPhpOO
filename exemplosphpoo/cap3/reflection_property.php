<?php 
require_once 'veiculo.php'; 
$rm = new ReflectionProperty('Automovel', 'placa'); 
print $rm->getName() . '<br>' . PHP_EOL; 

print $rm->isPrivate() ? 'É private' : 'Não é private'; 
print '<br>' . PHP_EOL; 

print $rm->isStatic() ? 'É estático' : 'Não é estático'; 
print '<br>' . PHP_EOL;