<?php 
require_once 'classes/Record.php'; 

class JSONExporter 
{ 
    public function export($data) { 
        return json_encode($data); 
    } 
} 

class Pessoa extends Record 
{ 
    const TABLENAME = 'pessoas'; 
    public function toJSON() { 
        $je = new JSONExporter; 
        return $je->export($this->data); 
    } 
} 

$p = new Pessoa; 
$p->nome     = 'Maria da Silva'; 
$p->endereco = 'Rua das flores'; 
$p->numero   = '123'; 
print $p->toJSON();