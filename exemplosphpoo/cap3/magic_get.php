<?php 
class Titulo 
{ 
    private $dt_vencimento, $valor, $juros, $multa; 
    
    public function __get($propriedade) 
    { 
        if ($propriedade == 'valor') { 
            print "Tentou acessar '{$propriedade}' inacessível. Use getValor()<br>\n"; 
            return 0; 
        } 
    } 
    
    public function getValor() 
    { 
        return $this->valor; 
    } 
} 

$titulo = new Titulo; 
print $titulo->valor;