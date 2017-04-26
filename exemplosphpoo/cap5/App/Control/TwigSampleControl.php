<?php
use Livro\Control\Page; 

class TwigSampleControl extends Page 
{ 
    public function __construct() 
    {
        parent::__construct();
        require_once 'Lib/Twig/Autoloader.php'; 
        Twig_Autoloader::register(); 
        
        $loader = new Twig_Loader_Filesystem('App/Resources'); 
        $twig = new Twig_Environment($loader); 
        $template = $twig->loadTemplate('form.html'); 
        
        $replaces = array(); 
        $replaces['title'] = 'Título'; 
        $replaces['action'] = 'index.php?class=TwigSampleControl&method=onGravar'; 
        $replaces['nome'] = 'Maria'; 
        $replaces['endereco'] = 'Rua das flores'; 
        $replaces['telefone'] = '(51) 1234-5678'; 
        
        $content = $template->render($replaces); 
        echo $content;
    }
    
    public function onGravar($params)
    {
        echo '<pre>';
        var_dump($_POST);
        echo '</pre>';
    }
}