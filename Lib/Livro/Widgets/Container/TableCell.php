<?php
/**
* Classe TTableCell
* Responsável pela exibição de uma célula de uma tabela
*/
class TableCell extends Element
{
	/**
	 * Método Construtor
	 * Instancia uma nova celula
	 */
	public function __construct( $value )
	{
		parent::__construct( 'td' );
		parent::add( $value );
	}
}