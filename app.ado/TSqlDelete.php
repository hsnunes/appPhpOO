<?php
/**
* Class TSqlDelete
* Esta classe provê meios para manipulação de DEETE.
*/
final class TSqlDelete extends TSqlInstruction
{
	/**
	 * metodo getInstruction()
	 */
	public function getInstruction()
	{
		// monta a string de DELETE
		$this->sql = "DELETE FROM {$this->entity}";
		// retorna a clausula WHERE do objeto $this->criteria
		if ( $this->criteria )
		{
			$expresison = $this->criteria->dump();
			if ( $expresison )
			{
				$this->sql .= ' WHERE '. $expresison;
			}
		}
		return $this->sql;
	}
}