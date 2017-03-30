<?php
// autoload
include_once 'autoload.php';
try
{
	// abre uma transação
	TTransaction::open( 'pg_livro' );

	########## INSERT ##########
	// cria uma transação de INSERT
	$sql = new TSqlInsert;
	// define o nome da entidade
	$sql->setEntity( 'famosos' );
	// atribui o valor de cada coluna
	$sql->setRowData( 'codigo', 8 );
	$sql->setRowData( 'nome', 'Galileu' );
	// obtém a conexão ativa
	$conn = TTransaction::get();
	// executa a instrução SQL
	$result = $conn->Query( $sql->getInstruction() );

	########## UPDATE ##########
	// cria uma instrução de UPDATE
	$sql = new TSqlUpdate;
	// define o nome da entidade
	$sql->setEntity( 'famosos' );
	// atribui o valor de cada coluna
	$sql->setRowData( 'nome', 'Galileu Galilei' );
	// cria critério de seleção de dados
	$criteria = new TCriteria;
	// obtém a pessoa de codigo 8
	$criteria->add( new TFilter( 'codigo', '=', '8' ) );
	// atribui o critério de seleção de dados
	$sql->setCriteria( $criteria );
	// obtém a conexão
	$conn = TTransaction::get();
	// executa a instrução SQL
	$result = $conn->Query( $sql->getInstruction() );
	// fecha a transação, aplicando todas as operações
	TTransaction::close();
}
catch (Exception $e)
{
	// exibe a mensagem de erro
	echo $e->getMessage();
	// desfaz todas as operações realizadas durante a transação
	TTransaction::rollback();
}