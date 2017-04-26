<?php
use Livro\Control\Page; 

class TwigWelcomeControl extends Page
{
    public function __construct()
    {
        parent::__construct();
        require_once 'Lib/Twig/Autoloader.php';
        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('App/Resources');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('welcome.html');
        $replaces = array();
        $replaces['nome'] = 'José Augusto';
        $replaces['rua'] = 'Rua das Acácias, 123';
        $replaces['cep'] = '12.345-678';
        $replaces['fone'] = '(00) 1234-5678';
        $content = $template->render($replaces);
        echo $content;
    }
    public function onSaibaMais($params)
    {
        echo 'mais informações...';
    }
}