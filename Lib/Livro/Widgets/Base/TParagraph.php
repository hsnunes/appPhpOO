<?php
/**
* Classe TParagraph
* Classe para exibição de parágrafos
*/
class TParagraph extends TElement
{
	/**
	 * Método Construtor
	 * instancia objeto TParagraph
	 * @param  $[text] [Texto a ser exibido]
	 */
	public function __construct( $text )
	{
		parent::__construct( 'p' );
		// atribui o contúdo do texto
		parent::add( $text );
	}
	/**
	 * Método setAlign()
	 * Define o alinhamento do texto
	 * @param $[align] [alinhamento do texto]
	 */
	public function setAlign( $align )
	{
		$this->align = $align;
	}
}