<?php
use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Widgets\Datagrid\Datagrid;
use Livro\Widgets\Datagrid\DatagridColumn;
use Livro\Widgets\Datagrid\DatagridAction;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Dialog\Question;
use Livro\Database\Transaction;
use Livro\Database\Repository;
use Livro\Database\Criteria;

/**
 * Listagem de Funcionários
 */
class FuncionarioList extends Page
{
    private $datagrid; // listagem
    private $loaded;

    /**
     * Construtor da página
     */
    public function __construct()
    {
        parent::__construct();
        // instancia objeto Datagrid
        $this->datagrid = new Datagrid;
        $this->datagrid->border = 1;
        $this->datagrid->style  = 'max-width: 650px';
        
        // instancia as colunas da Datagrid
        $codigo   = new DatagridColumn('id',         'Código', 'right', 50);
        $nome     = new DatagridColumn('nome',       'Nome',    'left', 200);
        $endereco = new DatagridColumn('endereco',   'Endereco','left', 200);
        $email    = new DatagridColumn('email',      'Email',   'left', 200);
        
        // adiciona as colunas à Datagrid
        $this->datagrid->addColumn($codigo);
        $this->datagrid->addColumn($nome);
        $this->datagrid->addColumn($endereco);
        $this->datagrid->addColumn($email);

        // instancia duas ações da Datagrid
        $action1 = new DatagridAction(array(new FuncionarioForm, 'onEdit'));
        $action1->setLabel('Editar');
        $action1->setImage('ico_edit.png');
        $action1->setField('id');
        
        $action2 = new DatagridAction(array($this, 'onDelete'));
        $action2->setLabel('Deletar');
        $action2->setImage('ico_delete.png');
        $action2->setField('id');

        // adiciona as ações à Datagrid
        $this->datagrid->addAction($action1);
        $this->datagrid->addAction($action2);

        // cria o modelo da Datagrid, montando sua estrutura
        $this->datagrid->createModel();
        
        parent::add( $this->datagrid );
    }

    /**
     * Carrega a Datagrid com os objetos do banco de dados
     */
    function onReload()
    {
        Transaction::open('livro'); // inicia transação com o BD
        $repository = new Repository('Funcionario');

        // cria um critério de seleção de dados
        $criteria = new Criteria;
        $criteria->setProperty('order', 'id');

        // carrega os produtos que satisfazem o critério
        $funcionarios = $repository->load($criteria);
        $this->datagrid->clear();
        if ($funcionarios)
        {
            foreach ($funcionarios as $funcionario)
            {
                // adiciona o objeto na Datagrid
                $this->datagrid->addItem($funcionario);
            }
        }

        // finaliza a transação
        Transaction::close();
        $this->loaded = true;
    }

    /**
     * Pergunta sobre a exclusão de registro
     */
    function onDelete($param)
    {
        $id = $param['id']; // obtém o parâmetro $id
        $action1 = new Action(array($this, 'Delete'));
        $action1->setParameter('id', $id);
        
        new Question('Deseja realmente excluir o registro?', $action1);
    }

    /**
     * Exclui um registro
     */
    function Delete($param)
    {
        try
        {
            $id = $param['id']; // obtém a chave
            Transaction::open('livro'); // inicia transação com o banco 'livro'
            $funcionario = Funcionario::find($id); // busca objeto Funcionario
            if ($funcionario) {
                $funcionario->delete(); // deleta objeto do banco de dados
            }
            Transaction::close(); // finaliza a transação
            $this->onReload(); // recarrega a datagrid
            new Message('info', "Registro excluído com sucesso");
        }
        catch (Exception $e)
        {
            new Message('error', $e->getMessage());
        }
    }

    /**
     * Exibe a página
     */
    function show()
    {
         // se a listagem ainda não foi carregada
         if (!$this->loaded)
         {
	        $this->onReload();
         }
         parent::show();
    }
}
