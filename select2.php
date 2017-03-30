<?php
	// autoload
	include_once 'autoload.php';
	// cria criterio de seleção de dados
	$criteria1 = new TCriteria;
	// Selecionar Todas as meninas sexoF que estão na 3 serie
	$criteria1->add( new TFilter( 'sexo','=','F' ) );
	$criteria1->add( new TFilter( 'serie','=','3' ) );
	// Selecionar todos os meninos M que estão na quarta serie
	$criteria2 = new TCriteria;
	$criteria2->add( new TFilter( 'sexo','=','M' ) );
	$criteria2->add( new TFilter( 'serie','=','4' ) );
	// Agora juntamos os dois criterios utilizando o operador logico
	// OR (ou). O resultado deve conter "meninas da 3 ou meninos da 4"
	$criteria = new TCriteria;
	$criteria->add( $criteria1, TExpression::OR_OPERATOR );
	$criteria->add( $criteria2, TExpression::OR_OPERATOR );
	// define o ordenamento da consulta
	$criteria->setProperty( 'order', 'name' );
	// cria a instrução SQL
	$sql = new TSqlSelect;
	// define o nome da entidade
	$sql->setEntity('aluno');
	// acrescenta colunas a consulta
	$sql->addColumn( '*');
	// define o criterio de seleção de dados
	$sql->setCriteria($criteria);
	// processa a instrução SQL
	echo $sql->getInstruction();
	echo "<br/>\n";