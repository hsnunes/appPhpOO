<?php 
require_once 'classes/Record.php'; 
interface ExporterInterface 
{ 
    public function export($data); 
} 

class XMLExporter implements ExporterInterface 
{ 
    public function export($data) 
    { 
        $data = array_flip($data); 
        $xml = new SimpleXMLElement('<record/>'); 
        array_walk_recursive($data, array ($xml, 'addChild')); 
        return $xml->asXML(); 
    } 
} 

class JSONExporter implements ExporterInterface 
{ 
    public function export($data) 
    { 
        return json_encode($data); 
    } 
}

class Pessoa extends Record 
{ 
    const TABLENAME = 'produtos'; 
    
    public function export(ExporterInterface $e) { 
        return $e->export($this->data); 
    } 
}

$p = new Pessoa; 
$p->nome     = 'Maria da Silva'; 
$p->endereco = 'Rua das flores'; 
$p->numero   = '123'; 
print $p->export( new XMLExporter ); 
print $p->export( new JSONExporter );