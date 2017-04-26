<?php
use Livro\Database\Transaction;
use Livro\Database\Repository;
use Livro\Database\Criteria;

class PessoaControl
{
    public function listar()
    {
        try {
            Transaction::open('livro');
            $criteria = new Criteria;
            $criteria->setProperty('order', 'id');
            
            $repository = new Repository('Pessoa');
            $pessoas = $repository->load($criteria);
            if ($pessoas) {
                foreach ($pessoas as $pessoa) {
                    print "{$pessoa->id} - {$pessoa->nome}<br>";
                }
            }
            Transaction::close();
        }
        catch (Exception $e) {
            print $e->getMessage();
        }
    }
    
    public function show( $param )
    {
        if ($param['method'] == 'listar') {
            $this->listar();
        }
    }
}