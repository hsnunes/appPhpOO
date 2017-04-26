<?php
use Livro\Control\Page;
use Livro\Control\Action; 

class ExemploActionControl extends Page 
{ 
    public function __construct() 
    {
        parent::__construct();
        
        $action1 = new Action(array($this, 'executaAcao1'));
        $action1->setParameter('codigo', 4);
        $action1->setParameter('nome', 'teste');
        
        print $action1->serialize();
    }
    
    public function executaAcao1($params)
    {
    }
}