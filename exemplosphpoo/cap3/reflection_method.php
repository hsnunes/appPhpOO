<?php 
require_once 'veiculo.php'; 
$rm = new ReflectionMethod('Automovel', 'setPlaca'); 
print $rm->getName() . '<br>' . PHP_EOL; 

print $rm->isPrivate() ? 'É private' : 'Não é private'; 
print '<br>' . PHP_EOL; 

print $rm->isStatic() ? 'É estático' : 'Não é estático'; 
print '<br>' . PHP_EOL; 

print $rm->isFinal() ? 'É final' : 'Não é final'; 
print '<br>' . PHP_EOL; 

print_r( $rm->getParameters() );