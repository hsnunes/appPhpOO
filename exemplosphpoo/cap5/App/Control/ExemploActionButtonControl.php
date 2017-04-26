<?php
use Livro\Control\Page;
use Livro\Control\Action; 
use Livro\Widgets\Base\Element;

class ExemploActionButtonControl extends Page 
{ 
    public function __construct() 
    {
        parent::__construct();
        
        $button1 = new Element('a');
        $button1->add('Ação 1');
        $button1->class = 'btn btn-success';
        
        $button2 = new Element('a');
        $button2->add('Ação 2');
        $button2->class = 'btn btn-primary';
        
        $action1 = new Action(array($this, 'executaAcao1'));
        $action1->setParameter('codigo', 4);
        
        $action2 = new Action(array($this, 'executaAcao2'));
        $action2->setParameter('codigo', 5);
        
        $button1->href = $action1->serialize();
        $button2->href = $action2->serialize();
        
        $button1->show();
        $button2->show();
    }
    
    public function executaAcao1($params)
    {
        echo '<br>' . json_encode($params);
    }
    
    public function executaAcao2($params)
    {
        echo '<br>' . json_encode($params);
    }
}