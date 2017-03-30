<?php
// autoload
include_once 'autoload.php';
try
{
	// abre uma transação
	TTransaction::open( 'pg_livro' );
	// define a estratégia de LOG
	TTransaction::setLogger( new TLoggerHTML( '/tmp/arquivo.html' ) );
	// escreve uma mensagem de LOG
	TTransaction::log( 'Inserindo registro William Wallace' );
	######### INSERT ##################
	// cria uma instrução INSERT
	$sql = new TSqlInsert;
	// define o nome da entidade
	$sql->setEntity( 'famosos' );
	// atribui o valor de cada coluna
	$sql->setRowData( 'codigo', 9 );
	$sql->setRowData( 'nome', 'William Wallace' );
	// obtem a conexão ativa
	$conn = TTransaction::get();
	// executa a instrução SQL
	$result = $conn->Query( $sql->getInstruction() );
	// escreve mensagem de LOG
	TTransaction::log( $sql->getInstruction() );
	// define a estratégia de LOG
	TTransaction::setLogger( new TLoggerXML( '/tmp/arquivo.xml' ) );
	// escreve mensagem de LOG
	TTransaction::log( 'Inserindo registro Albert Einstein' );
	// cria uma instrução de INSERT
	$sql = new TSqlInsert;
	// define o nome da entidade
	$sql->setEntity( 'famosos' );
	// atribui o valor de cada coluna
	$sql->setRowData( 'codigo', 10 );
	$sql->setRowData( 'nome', 'Albert Einstein' );
	// obtém a conexão ativa
	$conn = TTransaction::get();
	// executa a instrução SQL
	$result = $conn->Query( $sql->getInstruction() );
	// escreve a mensagem de LOG
	TTransaction::log( $sql->getInstruction() );
	// fecha a transação, aplicando todas as operações
	TTransaction::close();
}
catch (Exception $e)
{
	// exibe a mensagem de erro
	echo $e->getMessage();
	// desfaz operações realizadas durante a transação
	TTransaction::rollback();
}