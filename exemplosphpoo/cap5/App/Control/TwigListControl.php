<?php
use Livro\Control\Page; 

class TwigListControl extends Page 
{ 
    public function __construct() 
    {
        parent::__construct();
        require_once 'Lib/Twig/Autoloader.php'; 
        Twig_Autoloader::register(); 
        
        $loader = new Twig_Loader_Filesystem('App/Resources'); 
        $twig = new Twig_Environment($loader); 
        $template = $twig->loadTemplate('list.html'); 
        
        $replaces = array();
        $replaces['titulo'] = 'Lista de pessoas'; 
        $replaces['pessoas'] = array(
                    array('codigo' => '1',
                          'nome' => 'Anita Garibaldi',
                          'endereco' => 'Rua dos Gaudérios'),
                    array('codigo' => '2',
                          'nome' => 'Bento Gonçalves',
                          'endereco' => 'Rua dos Gaudérios'),
                    array('codigo' => '3',
                          'nome' => 'Giuseppe Garibaldi',
                          'endereco' => 'Rua dos Gaudérios')
                );
        
        $content = $template->render($replaces); 
        echo $content;
    }
}
