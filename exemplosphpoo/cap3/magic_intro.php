<?php 
class Titulo 
{ 
    private $dt_vencimento; 
    private $valor; 
    private $juros; 
    private $multa;
} 

$titulo = new Titulo; 
print $titulo->valor;