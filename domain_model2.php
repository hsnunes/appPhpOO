<?php
/**
* class Produto
* representa um produto a ser vendido
*/
final class Produto
{
	private $descricao;		// descrição do produto
	private $estoque;		// estoque atual
	private $precoCusto;	//preço de custo
	/**
	 * método construtor
	 * define alguns valores iniciais
	 * @param $descricao		= descrição do produto
	 * @param $estoque			= estoque atual
	 * @param precoCusto		= preço de custo
	 */
	public function __construct( $descricao, $estoque, $precoCusto )
	{
		$this->descricao 	= $descricao;
		$this->estoque		= $estoque;
		$this->precoCusto	= $precoCusto;
	}
	/**
	 * método registraCompra
	 * registra uma compra, atualiza custo e incrementa o estoque atual
	 * @param $unidades		= unidades adquiridas
	 * @param $precoCusto	= novo preço de custo
	 */
	public function registraCompra( $unidades, $precoCusto )
	{
		$this->precoCusto	= $precoCusto;
		$this->estoque		= $unidades;
	}
	/**
	 * método registraVenda
	 * registrauma venda e decrementa o estoque
	 * @param $unidades = unidades vendidas
	 */
	public function registraVenda( $unidades )
	{
		$this->estoque -= $unidades;
	}
	/**
	 * método getEstoque
	 * retorna a quantidade em estoque
	 */
	public function getEstoque()
	{
		return $this->estoque;
	}
	/**
	 * método calculaPrecoVenda()
	 * retorna o preço de venda, baseado em uma margem de 30% sobre o custo
	 */
	public function calculaPrecoVenda()
	{
		return $this->precoCusto * 1.3;
	}
}
/**
* class Venda
* representa uma Venda de Produtos
*/
final class Venda
{
	private $itens;		// itens da cesta
	/**
	 * método addItem
	 * adiciona um item na cesta
	 * @param $quantidade = quantidade vendida
	 * @param $produto = objeto produto
	 */
	public function addItem( $quantidade, Produto $produto )
	{
		$this->itens[] = [ $quantidade, $produto ];
	}
	/**
	 * método getItens
	 * retorna o array de itens da cesta
	 */
	public function getItens()
	{
		return $this->itens;
	}
	/**
	 * método finaliza
	 * calcula o total de uma cesta e diminur o estoque
	 */
	public function finalizaVenda()
	{
		foreach ($this->itens as $item )
		{
			$quantidade = $item[0];
			$produto = $item[1];
			// soma o total
			$total += $produto->calculaPrecoVenda() * $quantidade;
			$produto->registraVenda( $quantidade );
		}
		return $total;
	}
}
// instancia objeto Venda
$venda = new Venda;
// adiciona alguns produtos
$venda->addItem( 3, new Produto( 'Vinho', 10, 15 ) );
$venda->addItem( 2, new Produto( 'Salame', 20, 20 ) );
$venda->addItem( 1, new Produto( 'Queijo', 30, 10 ) );
// finaliza a venda
echo $venda->finalizaVenda();
