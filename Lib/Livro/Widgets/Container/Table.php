<?php
/**
* Classe TTable
* Responsável pela exibição de tabelas
*/
class Table extends Element
{
	/**
	 * Método Construtor
	 * instancia uma nova tabela
	 */
	public function __construct()
	{
		parent::__construct( 'table' );
	}
	/**
	 * Método addRow()
	 * Agrega um novo objeto linha TTableRow na tabela
	 */
	public function addRow()
	{
		$row = new TTableRow();
		parent::add( $row );
		return $row;
	}
}