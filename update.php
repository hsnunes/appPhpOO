<?php
	// autoload
	include_once 'autoload.php';
	// cria critério de seleção de dados
	$criteria = new TCriteria;
	$criteria->add( new TFilter( 'id', '=', '3' ) );
	// Cria a instrução de UPDATE
	$sql = new TSqlUpdate;
	// cria a instrução de UPDATE
	$sql->setEntity('aluno');
	// atribui o valor de cada coluna
	$sql->setRowData( 'nome', 'Hilder Nunes' );
	$sql->setRowData( 'rua', 'Tv Bom Jardim' );
	$sql->setRowData( 'fone', '(91) 3222 4321' );
	// definindo o criterio de seleção de dados
	$sql->setCriteria($criteria);
	// processa a instrução SQL
	echo $sql->getInstruction();
	echo "<br />\n";