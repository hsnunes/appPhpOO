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
	 * @param $id 				= ID do prodto
	 * @param $descricao	= descrição do produto
	 * @param $estoque		= estoque atual
	 * @param $precoCusto	= preço de custo
	 */
	function insert( $id, $descricao, $estoque, $precoCusto )
	{
		// cria instrução SQL de insert
		$sql = "INSERT INTO Produtos ( id, descricao, estoque, precoCusto )"." VALUES ( $id, $descricao, $estoque, $precoCusto )";
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
	 * @param $id 			= ID do produto
	 * @param $descricao	= descricao do produto
	 * @param estoque		= estoque atual
	 * @param $precoCusto	= preço de custo
	 */
	public function update( $id, $descricao, $estoque, $precoCusto )
	{
		// cria instrução SQL de UPDATE
		$sql = "UPDATE produtos set descricao = `{$descricao}`, estoque = `{$estoque}`, precoCusto = `{$precoCusto}` WHERE id = `{$id}`";
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
// instancia pbjeto ProdutoGateway
$gateway  new ProdutoGateway;
// insere alguns registros na tabela
$gateway->insere( 1, `Vinho`, 10, 10 );
$gateway->insere( 2, `Salame`, 20, 20 );
$gateway->insere( 3, `Queijo`, 30, 30 );
// efetua algumas alterações
$gateway->update( 1, `Vinho`, 20, 20 );
$gateway->update( 2, `Salame`, 40, 40 );
// exclui o produto 3
$gateway->delete( 3 );
// exibe novamente os registros
echo "Lista de Produtos<br />\n";
print_r( $gateway->getObjects() );