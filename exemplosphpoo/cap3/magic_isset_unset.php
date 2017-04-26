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
    
    public function __isset($propriedade) 
    { 
        return isset($this->data[$propriedade]); 
    } 
    
    public function __unset($propriedade) 
    { 
        unset($this->data[$propriedade]); 
    } 
} 

$titulo = new Titulo; 
$titulo->valor = 12345; 

if (isset($titulo->valor)) { 
    print "Valor definido<br>\n"; 
} else { 
    print "Valor não definido<br>\n"; 
} 

unset($titulo->valor); 

if (isset($titulo->valor)) { 
    print "Valor definido<br>\n"; 
} else { 
    print "Valor não definido<br>\n"; 
} 