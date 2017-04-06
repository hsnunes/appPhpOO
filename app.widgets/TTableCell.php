<?php
/**
* Classe TTableCell
* Responsável pela exibição de uma célula de uma tabela
*/
class TTableCell extends TElement
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