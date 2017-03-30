<?php
/**
* Classe TSqlUpdate
* Esta classe provê meios para manipulação de uma instrução de update no banco de dados
*/
final class TSqlUpdate extends TSqlInstruction
{
	private $columnValues;
	/**
	 * método setRowData()
	 * Atribui valores à determinadas colunas no banco de dados que serão modificadas
	 * @param $column = coluna da tabela
	 * @param $value = valor a ser armazenado
	 */
	final function setRowData( $column, $value )
	{
		// verifica se é um dado escalar (string, inteiro,...)
		if (is_scalar($value))
		{
			// monta um array indexado pelo nome da coluna
			if ( is_string($value) and (!empty($value)) )
			{
				// adiciona \ em aspas
				$value = addslashes($value);
				// caso seja uma string
				$this->columnValues[$column] = "'{$value}'";
			}
			else if ( is_bool($value) )
			{
				// caso seja um boolean
				$this->columnValues[$column] = $value ? 'TRUE' : 'FALSE';
			}
			else if ( $value!=='' )
			{
				// caso seja outro tipo de dado
				$this->columnValues[$column] = $value;
			}
			else
			{
				// caso seja NULL
				$this->columnValues[$column] = "NULL";
			}
		}
	}
	/**
	 * metodo getInstruction()
	 * Retorna a instrução de update em forma de string
	 */
	public function getInstruction()
	{
		// monta a string de Update
		$this->sql = "UPDATE {$this->entity}";
		// monta os pares: coluna=valor...
		if ( $this->columnValues )
		{
			foreach ( $this->columnValues as $column => $value )
			{
				$set[] = "{$column} = {$value}";
			}
		}
		$this->sql .= ' SET '. implode( ', ', $set );
		// retorna a clausula where do objeto $this->criteria
		if ( $this->criteria )
		{
			$this->sql .= ' WHERE '.$this->criteria->dump();
		}
		return $this->sql;
	}
}