<?php
// autoload
include_once 'autoload.php';
// cria a instrução SELECT
$sql = new TSqlSelect;
// define o nome da entidad
$sql->setEntity( 'famosos' );
// acrescenta colunas à coluna
$sql->addColumn( 'codigo' );
$sql->addColumn( 'nome' );
// cria criterio de seleção de dados
$criteria = new TCriteria;
// obtém a pessoa de codigo 1
$criteria->add( new TFilter( 'codigo','=','1' ) );
// atribui o criterio de seleção de dados
$sql->setCriteria( $criteria );
// -------------------- >
try {
	// abre conexao com base de dados mysql
	$conn = TConnection::open( 'my_livro' );
	// executa a instrução SQL
	$result = $conn->query( $sql->getInstruction() );
	if ( $result )
	{
		$row = $result->fetch( PDO::FETCH_ASSOC );
		// exibe os dados resultantes
		echo $row['codigo'].' - '.$row['nome']."\n";
	}
	// fecha a conexão
	$conn = NULL;
}
catch (Exception $e)
{
	// exibe a mensagem do erro
	print "Erro!: ".$e->getMessage()."<br/>";
	die();
}
// ------------------------------- >
try {
	// abre conexao com base de dados mysql
	$conn = TConnection::open( 'pg_livro' );
	// executa a instrução SQL
	$result = $conn->query( $sql->getInstruction() );
	if ( $result )
	{
		$row = $result->fetch( PDO::FETCH_ASSOC );
		// exibe os dados resultantes
		echo $row['codigo'].' - '.$row['nome']."\n";
	}
	// fecha a conexão
	$conn = NULL;
}
catch (Exception $e)
{
	// exibe a mensagem do erro
	print "Erro!: ".$e->getMessage()."<br/>";
	die();
}