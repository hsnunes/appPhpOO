<?php
/**
* Classe Repository
*/
final class Repository
{
	private $activeRecord; // classe que manipulada pelo repositorio
	function __construct( $class )
	{
		$this->activeRecord = $class;
	}
	public function load( Criteria $criteria )
	{
		$sql = "SELECT * FROM ". constant( $this->activeRecord.'::TABLENAME' );
		if ( $criteria )
		{
			$expression = $criteria->dump();
			if ( $expression )
			{
				$sql .= ' WHERE '. $expression;
			}
			$order = $criteria->getProperty( 'order' );
			$limit = $criteria->getProperty( 'limit' );
			$offset = $criteria->getProperty( 'offset' );
			if ( $order )
			{
				$sql .= ' ORDER BY '. $order;
			}
			if ( $limit )
			{
				$sql .= ' LIMIT '. $order;
			}
			if ( $offset )
			{
				$sql .= ' OFFSET '. $offset;
			}
			if ( $conn = Transaction::get() )
			{
				Transaction::log( $sql );
				$result = $conn->query( $sql );
				$results = [];
				if ( $result )
				{
					while ( $row = $result->fetchObject( $this->activeRecord ) )
					{
						$results[] = $row;
					}
				}
				return $results;
			}
		} else
		{
			throw new Exception( 'Não há transação ativa' );
		}
	}
	public function delete( Criteria $criteria  )
	{
		$expression = $criteria->dump();
		$sql = "DELETE FROM " . constant( $this->activeRecord.'::TABLENAME' );
		if ( $expression )
		{
			$sql .= ' WHERE '. $expression;
		}
		if ( $conn = Transaction::get() )
		{
			Transaction::log( $sql );
			$result = $conn->exec( $sql );
			return $result;
		} else
		{
			throw new Exception( 'Não há transação ativa' );
		}
	}
	public function count( Criteria $criteria )
	{
		$expression = $criteria->dump();
		$sql = "SELECT count(*) FROM " . constant( $this->activeRecord.'::TABLENAME' );
		if ( $expression )
		{
			$sql .= ' WHERE '. $expression;
		}
		if ( $conn = Transaction::get() )
		{
			Transaction::log( $sql );
			$result = $conn->query( $sql );
			if ( $result )
			{
				$row = $result->fetch();
			}
			return $row[0];
		} else
		{
			throw new Exception( 'Não há transação ativa' );
		}
	}

}