<?php
/**
* class Produto
* representa um Produto a ser vendido
*/
final class Produto
{
	static $recordset = [];
	/**
	 * método adicionar()
	 * adiciona um produto ao registro
	 * @param $descricao = descrição do produto
	 * @param $estoque = estoque atual
	 * @param $precoCusto = preço de custo
	 */
	function adicionar( $id, $descricao, $estoque, $precoCusto )
	{
		self::$recordset[$id]['descricao'] = $descricao;
		self::$recordset[$id]['estoque'] = $estoque;
		self::$recordset[$id]['precoCusto'] = $precoCusto;
	}
	/**
	 * método registraCompra
	 * registra uma compra, atualiza custo e incrementa o estoque atual do produto
	 * @param $unidades = unidades adquiridas
	 * @param $precoCusto = novo preço de custo
	 */
	public function registraCompra( $id, $unidades, $precoCusto )
	{
		self::$recordset[$id]['precoCusto'] = $precoCusto;
		self::$recordset[$id]['estoque'] += $unidades;
	}
	/**
	 * método registraVenda()
	 * registra uma venda e decrementa o estoque
	 * @param $unidades = unidade vendidas
	 */
	public function registraVenda( $id, $unidades )
	{
		self::$recordset[$id]['estoque'] -= $unidades;
	}
	/**
	 * método getEstoque
	 * retorna a quantidade em estoque
	 * @param $id = ponteio do registro da tabela
	 */
	public function getEstoque( $id )
	{
		return self::$recordset[$id]['estoque'];
	}
	/**
	 * método calculaPrecoVenda()
	 * retorna o preço de venda, baseado em uma margem de 30% sobre o custo
	 */
	public function calculaPrecoVenda( $id )
	{
		return self::$recordset[$id]['precoCusto'] * 1.3;
	}
}
// Exemplo prático
// intancia objeto Produto
$produto = new Produto;

// adiciona alguns produtos
$produto->adicionar( 1, 'Vinho', 10, 15 );
$produto->adicionar( 2, 'Salame', 10, 20 );

// exibe os estoques atuais
echo "estoques: <br />\n";
echo $produto->getEstoque( 1 )."<br />\n";
echo $produto->getEstoque( 2 )."<br />\n";

// exibe os preços de venda
echo "Preços de venda: <br />\n";
echo $produto->calculaPrecoVenda( 1 )."<br />\n";
echo $produto->calculaPrecoVenda( 2 )."<br />\n";

// Vende algunas uniaddes
$produto->registraVenda( 1, 5 );
$produto->registraVenda( 2, 10 );

// repõe o estoque
$produto->registraCompra( 1, 5, 16 );
$produto->registraCompra( 2, 10, 22 );

// exibe os preços de venda atuais
echo "preços de venda: <br />\n";
echo $produto->calculaPrecoVenda( 1 )."<br />";
echo $produto->calculaPrecoVenda( 2 )."<br />";