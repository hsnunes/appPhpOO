<?php
use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Text;

class ContatoForm extends Page
{
    private $form;
    
    function __construct()
    {
        parent::__construct();
        
        // instancia um formulário
        $this->form = new Form('form_contato');
        $this->form->setFormTitle('Formulário de contato');
        $this->form->style = 'display:block; margin:20px;';
        
        // cria os campos do formulário
        $nome     = new Entry('nome');
        $email    = new Entry('email');
        $assunto  = new Combo('assunto');
        $mensagem = new Text('mensagem');
        
        $this->form->addField('Nome', $nome, 300);
        $this->form->addField('E-mail', $email, 300);
        $this->form->addField('Assunto', $assunto, 300);
        $this->form->addField('Mensagem', $mensagem, 300);
        
        // define alguns atributos
        $assunto->addItems( array('1' => 'Sugestão',
                                  '2' => 'Reclamação',
                                  '3' => 'Suporte técnico',
                                  '4' => 'Cobrança',
                                  '5' => 'Outro') );
        $mensagem->setSize(300, 80);
        
        $this->form->addAction('Enviar', new Action(array($this, 'onSend')));
        
        // adiciona o formulário na página
        parent::add($this->form);
    }
    
    /**
     * Envia os dados
     */
    function onSend($p)
    {
        try
        {
            // obtém os dados
            $dados = $this->form->getData();
            
            // mantém o formulário preenchido
            $this->form->setData($dados);
            
            // valida
            if (empty($dados->email)) {
                throw new Exception('Email vazio');
            }
            if (empty($dados->assunto)) {
                throw new Exception('Assunto vazio');
            }
            
            // monta mensagem
            $mensagem  = "Nome: {$dados->nome} <br>";
            $mensagem .= "Email: {$dados->email} <br>";
            $mensagem .= "Assunto: {$dados->assunto} <br>";
            $mensagem .= "Mensagem: {$dados->mensagem} <br>";
            new Message('info', $mensagem);
        }
        catch (Exception $e)
        {
            new Message('error', '<b>Erro</b> ' . $e->getMessage());
        }
    }
    
    function onLoad()
    {
        $obj = new stdClass;
        $obj->mensagem = 'Escreva aqui o motivo do contato. Seja o mais claro possível...';
        $this->form->setData($obj);
    }
}
