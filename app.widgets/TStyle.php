<?php
/**
* Classe TStyle
* Classe para abstração de EStilos CSS
*/
class TStyle
{
	private $name;
	private $properties;
	static private $loaded;
	/**
	 * Método __construct()
	 * @param [string] $nomeTag [nome da tag]
	 */
	public function __construct( $nomeTag )
	{
		$this->name = $nomeTag;
	}
	/**
	 * Método __set()
	 * intercepta a atribuições à propriedades do objeto
	 * @param $[name] [nome da propriedade]
	 * @param $[value] [valor]
	 */
	public function __set( $name, $value )
	{
		$name = str_replace( '_' , '-', $name );
		$this->properties[$name] = $value;
	}
	/**
	 * Método show()
	 * exibe a tag na tela
	 */
	public function show()
	{
		// Verifica se um estilo ja foi carregado
		if ( !isset(self::$loaded[$this->name]) )
		{
			echo "<style tyle='text/css' media='screen'>",PHP_EOL;
			// exibe a abertura do estilo
			echo ".{$this->name}",PHP_EOL;
			echo "{",PHP_EOL;
			if ( $this->properties )
			{
				// percorre as propriedades
				foreach ( $this->properties as $name => $value )
				{
					echo "\t{$name}: {$value};",PHP_EOL;
				}
			}
			echo "}",PHP_EOL;
			echo "</style>",PHP_EOL;
			// marca o estilo como já carregado
			self::$loaded[$this->name] = TRUE;
		}
	}
}