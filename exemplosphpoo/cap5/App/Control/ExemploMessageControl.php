<?php
use Livro\Control\Page;
use Livro\Widgets\Dialog\Message;

class ExemploMessageControl extends Page 
{ 
    public function __construct() 
    { 
        parent::__construct();
        
        new Message('info', 'Mensagem informativa');
        
        new Message('error', 'Mensagem de erro');
    }
}