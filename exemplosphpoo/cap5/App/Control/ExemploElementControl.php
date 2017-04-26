<?php
use Livro\Control\Page;
use Livro\Widgets\Base\Element;

class ExemploElementControl extends Page 
{ 
    public function __construct() 
    { 
        parent::__construct();
        
        $div= new Element('div'); 
        $div->style = 'text-align:center;';
        $div->style.= 'font-weight: bold;';
        $div->style.= 'font-size: 14pt';
        
        $p = new Element('p'); 
        $p->add('Sport Club Internacional'); 
        $div->add($p); 
        
        $img= new Element('img'); 
        $img->src   = 'App/Images/inter.png';  
        $div->add($img);
        
        $p = new Element('p'); 
        $p->add('Clube do povo do Rio Grande do Sul'); 
        $div->add($p);
        
        parent::add($div);
    }
}