<?php
/**
* Classe TStyle
* Classe para abstração de EStilos CSS
*/
class TStyle
{
	private $name;
	private $properties;
	private $loaded;
	/**
	 * Método __construct()
	 * @param [string] $nomeTag [nome da tag]
	 */
	function __construct( $nomeTag )
	{
		$this->name = $nomeTag;
	}
}