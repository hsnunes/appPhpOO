<?php
/**
* Classe TImage
* Classe para exibição de imagens
*/
class TImage extends TElement
{
	private $source;	// localizador da imagem
	/**
	 * Método Construtor
	 * instancia objeto TImage
	 * @param [string] $source [localização da imagem]
	 * @see  $this->tag [Object TElement]
	 */
	public function __construct( $source )
	{
		parent::__construct( 'img' );
		$this->src = $source;
		$this->border = 0;
	}
}