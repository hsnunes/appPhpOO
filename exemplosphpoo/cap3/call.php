<?php 
class Titulo 
{ 
    public $codigo, $dt_vencimento, $valor, $juros, $multa; 
    
    public function __call($method, $values) 
    { 
        print "Você executou o método {$method}, com os parâmetros: ".implode(',', $values) . "<br>\n"; 
    } 
} 

$titulo = new Titulo; 
$titulo->codigo = 1; 
$titulo->dt_vencimento = '2015-05-20'; 
$titulo->valor = 12345; 
$titulo->juros = 0.1; 
$titulo->multa = 2; 

$titulo->teste1(1,2,3); 
$titulo->teste2(4,5,6);