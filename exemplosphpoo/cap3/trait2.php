<?php 
require_once 'classes/Record.php';
trait ObjectConversionTrait 
{ 
    public function toXML() 
    { 
        $data = array_flip($this->data); 
        $xml = new SimpleXMLElement('<'.get_class($this).'/>'); 
        array_walk_recursive($data, array ($xml, 'addChild')); 
        return $xml->asXML(); 
    } 
    public function toJSON() 
    { 
        return json_encode($this->data); 
    } 
}

class Pessoa extends Record 
{ 
    const TABLENAME = 'pessoas'; 
    use ObjectConversionTrait; 
}

$p = new Pessoa; 
$p->nome     = 'Maria da Silva'; 
$p->endereco = 'Rua das flores'; 
$p->numero   = '123'; 

print $p->toXML(); 
print $p->toJSON();

class Produto extends Record 
{ 
    const TABLENAME = 'produtos'; 
    
    use ObjectConversionTrait { 
        toJSON as exportToJSON; 
    } 
} 

$p2 = new Produto; 
$p2->descricao = 'Chocolate'; 
$p2->preco = 7; 
print $p2->exportToJSON();