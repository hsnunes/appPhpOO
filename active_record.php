<?php
/**
* classe ProdutoGateway
* implementa Active Record
*/
class ProdutoGateway
{
	private $data;
	public function __get( $prop )
	{
		return $this->data[$prop];
	}
	public function __set( $prop, $value )
	{
		$this->data[$prop] = $value;
	}
	/**
	 * método insert
	 * armazena o objeto na tabela de produtos
	 */
	public function insert()
	{
		// Cria uma instrução SQL de insert
		$sql = "INSERT INTO Produtos( id, descricao, estoque, precoCusto )".
			" VALUES( `{$this->id}`, `{$this->descricao}`, `{$this->estoque}`, `{$this->precoCusto}` )";
		echo $sql . "<br />\n";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa instrução SQL
		$conn->exec( $sql );
		unset( $conn );
	}
	/**
	 * método update
	 * altera os dados do objeto na tabela de produtos
	 */
	public function update()
	{
		// cria a instrução SQL de update
		$sql = "UPDATE produtos set ".
			" descricao = `{$this->descricao}`,".
			" descricao = `{$this->estoque}`,".
			" descricao = `{$this->precoCusto}`".
			" WHERE id = `{$this->id}`";
		echo $sql . "<br />\n";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa a instrução SQL
		$conn->exec( $sql );
		unset( $conn );
	}
	/**
	 * método delete
	 * deleta o objeto da tabela de produtos
	 */
	public function delete()
	{
		// cria instrução SQL de DELETE
		$sql = "DELETE DROM produtos WHERE id = `{$this->id}`";
		echo $sql . "<br />\n";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa a instrução SQL
		$conn->exec( $sql );
		unset( $conn );
	}
	/**
	 * método registraCompra
	 * registra uma compra, atualiza custo e incrementa o estoque atual
	 * @param $unidades = unidades adquiridas
	 * @param $precoCusto = um novo preço de custo
	 */
	public function registraCompra( $unidades, $precoCusto )
	{
		$this->precoCusto = $precoCusto;
		$this->estoque += $unidades;
	}
	/**
	 * metodo registraVenda
	 * registra uma venda e decrementa o estoque
	 * @param $unidades = unidades vendidas
	 */
	public function registraVenda( $unidades )
	{
		$this->estoque -= $unidades;
	}
	/**
	 * método calculaPrecoVenda
	 * retorna o preço da venda, baseado em uma margem de 30% sobre o custo
	 */
	public function calculaPrecoVenda()
	{
		return $this->precoCusto * 1.3;
	}
	/**
	 * método getObject
	 * carega um objeto a partir da tabela de produtos
	 */
	public function getObject( $id )
	{
		// criainstrução SQL de SELECT
		$sql = "SELECT * FROM produtos WHERE id = `{$this->id}`";
		echo $sql . "<br />\n";
		// instancia objeto PDO
		$conn = new PDO( 'sqlite:produtos.db' );
		$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		// executa a instrução SQL
		$result = $conn->query( $sql );
		$this->data = $result->fetch( PDO::FETCH_ASSOC );
		unset( $conn );
	}
}
// insere produtos na base de dados
$vinho = new ProdutoGateway;
$vinho->id = 1;
$vinho->descricao = 'Vinho Cabernet';
$vinho->estoque = 10;
$vinho->precoCusto = 10;
$vinho->insert();

$vinho->registraVenda(5);
echo 'estoque: '. $vinho->estoque."<br />\n";
echo 'precoCusto: '. $vinho->precoCusto."<br />\n";
echo 'precoVenda: '. $vinho->calculaPrecoVenda()."<br />\n";

$vinho->registraCompra(10, 20 );
$vinho->update();
echo 'estoque: '.$vinho->estoque."<br />\n";
echo 'precoCusto: '. $vinho->precoCusto."<br />\n";
echo 'precoVenda: '. $vinho->calculaPrecoVenda()."<br />\n";

// $salame = new ProdutoGateway;
// $salame->id = 2;
// $salame->descricao = 'Salame';
// $salame->estoque = 20;
// $salame->precoCusto = 20;
// $salame->insert();
// // recupera um objeto e realiza uma alteração
// $objeto = new ProdutoGateway;
// $objeto->getObject(2);
// $objeto->estoque = $objeto->estoque * 2;
// $objeto->descricao = "Salaminho Italiano";
// $objeto->update();
// // exclui o produto vinho da tabela
// $vinho->delete();