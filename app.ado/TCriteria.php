<?php
/**
 * Classe TCriteria
 * Esta clase provê uma interface utilizada para definição de criterio
 */
class TCriteria extends TExpression
{
	private $expressions; // armazena a lista de expressoes
	private $operators; // armazena a lista de operadores
	private $properties; // propriedades do critério
	/**
	 * Metodo Construtor
	 */
	function __construct()
	{
		$this->expressions = [];
		$this->operators = [];
	}
	/**
	 * método add()
	 * adiciona uma expressao ao criterio
	 * @param $expression = expressão (objeto TExpression)
	 * @param operator = operador lógico de comparação
	 */
	public function add( TExpression $expression, $operator = self::AND_OPERATOR )
	{
		// na primeira vez, não precisamos de operadores lógicos para concatenar
		if ( empty($this->expressions) )
		{
			$operator = NULL;
			// unset($operator);
		}
		// agrega o resultado da expressão à lista de expressões
		$this->expressions[] = $expression;
		$this->operators[] = $operator;
	}
	/**
	 * método dump()
	 * retorna a expressão final
	 */
	public function dump()
	{
		// concatena a lista de expressoes
		if ( is_array($this->expressions) )
		{
			$result = '';
			foreach ($this->expressions as $i => $expression) {
				$operator = $this->operators[$i];
				// concatena o operador com a respectiva expressão
				$result .= $operator.$expression->dump().' ';
			}
			$result = trim($result);
			return "({$result})";
		}
	}
	/**
	 * metodo getProperty()
	 * retorna o valor de uma propriedade
	 * @param $property = propriedade
	 */
	public function setProperty($property, $value)
	{
		if ( isset($value) )
		{
			$this->properties[$property] = $value;
		}
		else
		{
			$this->properties[$property] = NULL;
		}
	}
	/**
	 * metodo getProperty()
	 * retorna o valor de uma propriedade
	 * @param $property = propriedade
	 */
	public function getProperty($property)
	{
		if ( isset( $this->properties[$property] ) )
		{
			return $this->properties[$property];
		}
	}
}