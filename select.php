<?php
	// autoload
	include_once 'autoload.php';
	// cria criterio de seleção de dados
	$criteria = new TCriteria;
	$criteria->add( new TFilter( 'nome','like','maria%' ) );
	$criteria->add( new TFilter( 'cidade','like','Porto%' ) );
	// define o intervalo de contula
	$criteria->setProperty('offset',0);
	$criteria->setProperty('limit',10);
	// define o ordenamento da consulta
	$criteria->setProperty( 'order', 'name' );
	// cria a instrução SQL
	$sql = new TSqlSelect;
	// define o nome da entidade
	$sql->setEntity('aluno');
	// acrescenta colunas a consulta
	$sql->addColumn( 'nome' );
	$sql->addColumn( 'fone' );
	// define o criterio de seleção de dados
	$sql->setCriteria($criteria);
	// processa a instrução SQL
	echo $sql->getInstruction();
	echo "<br/>\n";