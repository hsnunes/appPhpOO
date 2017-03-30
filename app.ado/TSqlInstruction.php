<?php
/**
 * classe TSqlInstruction.php
 * Esta classe provê ps métodos em comum entre todas instruções SQL (SELEC, INSERT, DELETE, UPDATE)
 */
abstract class TSqlInstruction
{
	protected $sql; // armazena a instrução SQL
	protected $criteria; // armazena o objeto critério
	protected $entity; // nome tabela do banco - *livro não aparece
	/**
	 * método setEntity()
	 * define o nome da entidade (tabela) manipulada pela instrução SQL
	 * @param $entity = tabela
	 */
	final public function setEntity($entity)
	{
		$this->entity = $entity;
	}
	/**
	 * método getEntity()
	 * retorna o nome da entidade (tabela)
	 */
	final public function getEntity()
	{
		return $this->entity;
	}
	/**
	 * método setCriteria()
	 * Define um critério de seleção atrvés da composição de um objeto
	 * do tipo TCriteria, que oferece uma interface para definição de critérios
	 * @param $criteria = objeto do tipo TCriteria
	 */
	public function setCriteria( TCriteria $criteria )
	{
		$this->criteria = $criteria;
	}
	/**
	* metodo getInstruction()
	 * declarando-o como <abstract> obrigamos sua implementação nas classes filhas
	 *uma vez que seu comportamento será distinto em cada uma delas, configurando o polimorfismo
	 */
	abstract function getInstruction();
}