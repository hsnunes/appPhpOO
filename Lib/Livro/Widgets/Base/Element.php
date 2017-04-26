<?php
/**
* Classe TElement
* Classe para abstralçai de tags HTML
*/
class TElement
{
	private $name;
	private $properties;
	private $children;
	/**
	 * Método Construtor
	 * @param [String] $nameTag [O nome da tag a ser criada]
	 */
	public function __construct( $nameTag )
	{
		$this->name = $nameTag;
	}
	/**
	 * Método __set()
	 * Interceptará as atribuições à propriedades do objeto
	 * @param $[name] [Nome da propriedade]
	 * @param $[value] [Valor da propriedade]
	 */
	public function __set( $name, $value )
	{
		$this->properties[$name] = $value;
	}
	/**
	 * Método add()
	 * Permite adicionar elementos filho ao objeto
	 * @param $[child] [Objeto filho]
	 */
	public function add( $child )
	{
		$this->children[] = $child;
	}
	/**
	 * Método open()
	 * Exibe a tag de abertura
	 */
	private function open()
	{
		echo "<{$this->name}";
		if ( $this->properties )
		{
			foreach ( $this->properties as $name => $value )
			{
				echo " {$name}=\"{$value}\"";
			}
		}
		echo '>';
	}
	/**
	 * Método show()
	 * Exibe a tag na tela, juntamente com seu conteudo
	 */
	public function show()
	{
		$this->open();
		echo PHP_EOL;
		if ( $this->children )
		{
			foreach ( $this->children as $child )
			{
				if ( is_object( $child ) )
				{
					$child->show();
				}
				else if ( is_string( $child ) OR is_numeric( $child ) )
				{
					echo $child;
				}
			}
		}
		$this->close();
	}
	/**
	 * Método close()
	 * Fecha uma tag HTML
	 */
	public function close()
	{
		echo "</{$this->name}>" , PHP_EOL;
	}
}