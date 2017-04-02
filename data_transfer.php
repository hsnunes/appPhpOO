<?php
/**
* classe PodutoGateway
* impleementa Table Data Gateway
*/
class ProdutoGateway
{
	/**
	 * método insert
	 * inserre dados na tabela de Produtos
	 * @param $object = objeto a ser inserido
	 */
	function insert( Produto $object )
	{
		// cria instrução SQL de insert
		$sql = "INSERT INTO Produtos ( id, descricao, estoque, precoCusto )"." VALUES ( $object->id, `{$object->descricao}`, `{$object->estoque}`, `{$object->precoCusto}` )";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa instrução SQL
		$conn->exec( $sql );
		unset( $conn );
	}
	/**
	 * método update
	 * altera os dados na tabela de Produtos
	 * @param $object = objeto a ser alterado
	 */
	public function update( Produto $object )
	{
		// cria instrução SQL de UPDATE
		$sql = "UPDATE produtos set descricao = `{$object->descricao}`, estoque = `{$object->estoque}`, precoCusto = `{$object->precoCusto}` WHERE id = `{$object->id}`";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa instrução SQL
		$conn->exec( $sql );
		unset( $conn );
	}
	/**
	 * método delete
	 * deleta um registro na tabela de Produtos
	 * @param $id 			= ID do produto
	 */
	public function delete( $id )
	{
		// cria instrução SQL de DELETE
		$sql = "DELETE FROM produtos WHERE id = `{$id}`";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa instrução SQL
		$conn->exec( $sql );
		unset( $conn );
	}
	/**
	 * método getObject
	 * busca um registro da tabela de produtos
	 * @param $id = ID do produto
	 */
	public function getObjet( $id )
	{
		// cria instrução SQL de SELECT
		$sql = "SELECT * FROM produtos WHERE id=`{$id}`";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$conn->setAttribute( PDO::ATTR_ERMODE, PDO::ERRMODE_WARNING );
		// executa a consulta SQL
		$result = $conn->query( $sql );
		$data = $result->fetch( PDO::FETCH_WARNING );
		unset( $conn );
		return $data;
	}
	/**
	 * metodo getObjects
	 * lista todos os registros da tabela de produtos
	 */
	public function getObjects()
	{
		// cria instrução SQL de SELECT
		$sql = "SELECT * FROM produtos";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa a consulta SQL
		$result = $conn->query( $sql );
		$data = $result->fetch( PDO::FETCH_ASSOC );
		unset( $conn );
		return $data;
	}
}
/**
* classe Produto
*/
class Produto
{
	public $id;
	public $descricao;
	public $estoque;
	public $precoCusto;
}
// instancia objeto ProdutoGeteway
$gateway = new ProdutoGateway;

$vinho = new Produto;
$vinho->id = 1;
$vinho->descricao = 'Vinho';
$vinho->estoque = 10;
$vinho->precoCusto = 15;
// inserre o objeto no banco de dados
$gateway->insert( $vinho );
// exibe o objeto de codigo 1
print_r( $gateway->getObject( 1 ) );
$vinho->descricao = 'Vinho Cabernet';
// atualiza o objeto no bando de dados
$gateway->update( $vinho );
// exibe o objeto de codigo 1
print_r( $gateway->getObjet(1) );