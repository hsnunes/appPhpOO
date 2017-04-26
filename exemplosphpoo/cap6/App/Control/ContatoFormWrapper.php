<?php
use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\Text;
use Livro\Widgets\Container\Panel;
use Livro\Widgets\Wrapper\FormWrapper;

class ContatoFormWrapper extends Page
{
    private $form;
    
    function __construct()
    {
        parent::__construct();
        
        // instancia um formulário
        $this->form = new FormWrapper(new Form('form_contato'));
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
        
        $panel = new Panel('Formulário de contato');
        $panel->add($this->form);
        
        // adiciona o painel na página
        parent::add($panel);
    }
    
    public function onSend()
    {
        // ...
    }
}
