<?php
/**
* Classe TTableRow
* Responsável pela exibição de uma linha de uma tabela
*/
class TableRow extends Element
{
	/**
	 * Método Construtor
	 * Instancia uma nova linha
	 */
	public function __construct()
	{
		parent::__construct( 'tr' );
	}
	/**
	 * Método addCell
	 * agrega um novo objeto célula TTableCell à linha
	 * @param $[value] [conteudo da celula]
	 */
	public function addCell( $value )
	{
		$cell = new TTableCell( $value );
		parent::add( $cell );
		return $cell;
	}
}