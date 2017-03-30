<?php
	// autoload
	include_once 'autoload.php';
	// define o LOCALE do sistema, para permitir ponto decimal.
	// PS: no windows, usar "english"
	setlocale(LC_NUMERIC, 'POSIX');
	// criar uma instrução de insert
	$sql = new TSqlInsert;
	$sql->setEntity('aluno');
	// atribui o valor de cada coluna
	$sql->setRowData( 'id', 3 );
	$sql->setRowData( 'nome', 'Hilder Nunes' );
	$sql->setRowData( 'fone', '(91)9808603351' );
	$sql->setRowData( 'nascimento', '1977-06-01' );
	$sql->setRowData( 'sexo', 'M' );
	$sql->setRowData( 'serie', '4' );
	$sql->setRowData( 'mensalidade', 280.40 );
	// processa a instrução SQL
	echo $sql->getInstruction();
	echo "<br />\n";