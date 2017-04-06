<?php
/**
* Classe TImage
* Classe para exibição de imagens
*/
class TImage
{
	private $source;	// localizador da imagem
	private $tag;		// objeto TElement
	/**
	 * Método Construtor
	 * instancia objeto TImage
	 * @param [string] $source [localização da imagem]
	 * @see  $this->tag [Object TElement]
	 */
	public function __construct( $source )
	{
		$this->source = $source;
		$this->tag = new TElement( 'img' );
	}
	/**
	 * Método show()
	 * Exibe imagem na tela
	 */
	public function show()
	{
		// define algumas propriedades da tag img
		$this->tag->src = $this->source;
		$this->tag->border = 0;
		$this->tag->show();
	}
}