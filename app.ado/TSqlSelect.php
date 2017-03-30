<?php
/**
* Classe TSqlSelect
* Esta classe provê meios para manipulação de uma instrução de SELECT no banco de dados
*/
final class TSqlSelect extends TSqlInstruction
{
	// array de colunas a serem retornadas
	private $columns;
	/**
	 * metodo addColumn()
	 * adiciona uma coluna a ser retornada pelo SELECT
	 * @param $column = coluna da tabela
	 */
	public function addColumn($column)
	{
		// adiciona a coluna no array
		$this->columns[] = $column;
	}
	/**
	 * metodo getInstruction()
	 * retorna a instrução de SELECT em forma de string
	 */
	public function getInstruction()
	{
		// monta a instrução de SELECT
		$this->sql = 'SELECT ';
		// monta string com  os nomes de colunas
		$this->sql .= implode( ',', $this->columns );
		// adiciona na clausula FROM o nome da tabela
		$this->sql .= ' FROM ' . $this->entity;
		// obtem a clausula WHERE do objeto criteria
		if ( $this->criteria )
		{
			$expresison = $this->criteria->dump();
			if ( $expresison )
			{
				$this->sql .= ' WHERE '.$expresison;
			}
			// obtem as propriedade do criterio
			$order = $this->criteria->getProperty( 'order' );
			$limit = $this->criteria->getProperty( 'limit' );
			$offset = $this->criteria->getProperty( 'offset' );
			// obetm a ordenação do SELECT
			if ( $order )
			{
				$this->sql .= ' ORDER BY '.$order;
			}
			if ( $limit )
			{
				$this->sql .= ' LIMIT '.$limit;
			}
			if ( $offset )
			{
				$this->sql .= ' OFFSET '. $offset;
			}
		}
		return $this->sql;
	}
}