<?php 
require_once 'veiculo.php'; 
$rc = new ReflectionClass('Automovel'); 

print_r($rc->getMethods());
print_r($rc->getProperties());
print_r($rc->getParentClass());