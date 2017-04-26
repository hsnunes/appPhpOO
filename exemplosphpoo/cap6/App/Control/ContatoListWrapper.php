<?php
use Livro\Control\Page;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Wrapper\DatagridWrapper;

class ContatoListWrapper extends Page
{
    private $datagrid; // listagem

    public function __construct()
    {
        parent::__construct();
        
        // instancia objeto Datagrid
        $this->datagrid = new DatagridWrapper( new Datagrid );
        $this->datagrid->style = 'max-width:700px';
        
        // instancia as colunas da Datagrid
        $codigo   = new DatagridColumn('id',         'Código',  'center', 80);
        $nome     = new DatagridColumn('nome',       'Nome',    'left',  200);
        $email    = new DatagridColumn('email',      'Email',   'left',  150);
        $assunto  = new DatagridColumn('assunto',    'Assunto', 'left',  230);

        // adiciona as colunas à Datagrid
        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($email);
        $this->datagrid->addColumn($assunto);
        
        // cria o modelo da Datagrid, montando sua estrutura
        $this->datagrid->createModel();
        
        // adiciona a datagrid à página
        parent::add($this->datagrid);
    }

    function onReload()
    {
        $this->datagrid->clear();
        
        $m1 = new stdClass;
        $m1->id      = 1;
        $m1->nome    = 'Maria da Silva';
        $m1->email   = 'maria@email.com';
        $m1->assunto = 'Dúvida sobre Formulários';
        $this->datagrid->addItem($m1);
        
        $m2 = new stdClass;
        $m2->id      = 2;
        $m2->nome    = 'Pedro Cardoso';
        $m2->email   = 'pedro@email.com';
        $m2->assunto = 'Dúvida sobre Listagens';
        $this->datagrid->addItem($m2);
        
        $m3 = new stdClass;
        $m3->id      = 3;
        $m3->nome    = 'José da Costa';
        $m3->email   = 'jose@email.com';
        $m3->assunto = 'Dúvida sobre Active Record';
        $this->datagrid->addItem($m3);
        
        $m4 = new stdClass;
        $m4->id      = 4;
        $m4->nome    = 'João Pereira';
        $m4->email   = 'joao@email.com';
        $m4->assunto = 'Dúvida sobre Repository';
        $this->datagrid->addItem($m4);
    }

    function show()
    {
        $this->onReload();
        parent::show();
    }
}
