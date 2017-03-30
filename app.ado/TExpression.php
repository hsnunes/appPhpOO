<?php
// namespace \App_ADO;
/**
 * Classe TExpression.php
 * Classe Abstrata para gerenciar expressões no queryObject
 */
abstract class TExpression
{
	// Operadores Lógicos
	const AND_OPERATOR = 'AND ';
	const OR_OPERATOR = 'OR ';
	// marca método dump() como obrigatório
	abstract public function dump();
}