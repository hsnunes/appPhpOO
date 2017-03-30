<?php
	// autoload
	include_once 'autoload.php';
	// cria criterio de seleção de dados
	$criteria = new TCriteria;
	$criteria->add( new TFilter( 'id','=','3' ) );
	// cria instrução de Delete
	$sql = new TSqlDelete;
	// define a entidade
	$sql->setEntity('aluno');
	// define o criterio de seleção de dados
	$sql->setCriteria($criteria);
	// processa a instrução SQL
	echo $sql->getInstruction();
	echo "<br/>\n";