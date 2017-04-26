<?php
use Livro\Control\Page;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Container\HBox;

class ExemploBoxControl extends Page 
{ 
    public function __construct() 
    { 
        parent::__construct();
        
        $panel1 = new Panel('Painel 1');
        $panel1->style = 'margin: 10px';
        $panel1->add( str_repeat('sdf sdf sdf sdf sdf sdf <br>', 5) );
        
        $panel2 = new Panel('Painel 2');
        $panel2->style = 'margin: 10px';
        $panel2->add( str_repeat('sdf sdf sdf sdf sdf sdf <br>', 5) );
        
        $box = new HBox;
        $box->add($panel1);
        $box->add($panel2);
        $box->show();
    }
}