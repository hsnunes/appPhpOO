<?php 
class Titulo 
{ 
    private $data; 
    
    public function __set($propriedade, $valor) 
    { 
        $this->data[$propriedade] = $valor; 
    } 
    
    public function __get($propriedade) 
    { 
        return $this->data[$propriedade]; 
    } 
} 

$titulo = new Titulo; 
$titulo->valor = 12345; 

print 'O valor é: ' . number_format($titulo->valor,2, ',', '.');