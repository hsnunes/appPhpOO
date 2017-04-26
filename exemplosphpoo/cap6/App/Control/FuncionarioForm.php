<?php
use Livro\Control\Page;
use Livro\Control\Action;
use Livro\Database\Transaction;
use Livro\Widgets\Form\Form;
use Livro\Widgets\Dialog\Message;
use Livro\Widgets\Form\Entry;
use Livro\Widgets\Form\Combo;
use Livro\Widgets\Form\CheckGroup;
use Livro\Widgets\Form\RadioGroup;
use Livro\Widgets\Wrapper\FormWrapper;

class FuncionarioForm extends Page
{
    private $form;
    
    function __construct()
    {
        parent::__construct();
        
        // instancia um formulário
        $this->form = new Form('form_funcionario');
        $this->form->setFormTitle('Cadastro de funcionários');
        $this->form->style = 'display:block; margin:20px;';
        
        // cria os campos do formulário
        $id           = new Entry('id');
        $nome         = new Entry('nome');
        $endereco     = new Entry('endereco');
        $email        = new Entry('email');
        $departamento = new Combo('departamento');
        $idiomas      = new CheckGroup('idiomas');
        $contratacao  = new RadioGroup('contratacao');
        
        $this->form->addField('Código', $id, 300);
        $this->form->addField('Nome', $nome, 300);
        $this->form->addField('Endereço', $endereco, 300);
        $this->form->addField('E-mail', $email, 300);
        $this->form->addField('Departamento', $departamento, 300);
        $this->form->addField('Idiomas', $idiomas, 300);
        $this->form->addField('Contratação', $contratacao, 300);
        
        $id->setEditable(FALSE);
        $idiomas->setLayout('horizontal');
        $contratacao->setLayout('horizontal');
        
        // define alguns atributos
        $departamento->addItems( array('1' => 'RH',
                                       '2' => 'Atendimento',
                                       '3' => 'Engenharia',
                                       '4' => 'Produção' ));
                                       
        $idiomas->addItems( array('1' => 'Inglês',
                                  '2' => 'Espanhol',
                                  '3' => 'Alemão',
                                  '4' => 'Italiano' ));
                                  
        $contratacao->addItems( array('1' => 'Estagiário',
                                      '2' => 'Pessoa Jurídica',
                                      '3' => 'CLT',
                                      '4' => 'Sócio' ));
        
        // adiciona as ações
        $this->form->addAction('Salvar', new Action(array($this, 'onSave')));
        $this->form->addAction('Limpar', new Action(array($this, 'onClear')));
        
        // adiciona o formulário na página
        parent::add($this->form);
    }
    
    /**
     * Salva os dados
     */
    public function onSave()
    {
        try
        {
            Transaction::open('livro');
            
            // obtém os dados
            $dados = $this->form->getData();
            
            // valida
            if (empty($dados->nome)) {
                throw new Exception('Nome vazio');
            }
            
            $funcionario = new Funcionario;
            $funcionario->fromArray( (array) $dados);
            $funcionario->idiomas = implode(',', (array) $dados->idiomas);
            $funcionario->store();
            
            $dados->id = $funcionario->id;
            Transaction::close();
            
            // mantém o formulário preenchido (agora com ID)
            $this->form->setData($dados);
            
            new Message('info', 'Dados salvos com sucesso');
        }
        catch (Exception $e)
        {
            new Message('error', '<b>Erro</b> ' . $e->getMessage());
        }
    }
    
    /**
     * Carrega o formulário
     */
    public function onEdit($param)
    {
        try
        {
            Transaction::open('livro');
            
            $id = isset($param['id']) ? $param['id'] : NULL;
            
            $funcionario = Funcionario::find($id);
            if ($funcionario)
            {
                if (isset($funcionario->idiomas))
                {
                    $funcionario->idiomas = explode(',', $funcionario->idiomas);
                }
                
                $this->form->setData( $funcionario );
            }
            Transaction::close();
        }
        catch (Exception $e)
        {
            new Message('error', '<b>Erro</b> ' . $e->getMessage());
        }
    }
    
    public function onClear()
    {
    }
}
