<?php 
$dom = new DOMDocument('1.0', "UTF-8"); 
$dom->formatOutput = true; 

$bases = $dom->createElement('bases'); 
$base  = $dom->createElement('base'); 
$bases->appendChild($base); 

$attr = $dom->createAttribute('id'); 
$attr->value = '1'; 
$base->appendChild($attr); 

$base->appendChild($dom->createElement('name', 'teste')); 
$base->appendChild($dom->createElement('host', '192.168.0.1')); 
$base->appendChild($dom->createElement('type', 'mysql')); 
$base->appendChild($dom->createElement('user', 'mary')); 
echo $dom->saveXML($bases); 