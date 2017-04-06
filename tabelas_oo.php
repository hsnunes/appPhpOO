<?php
require_once __DIR__.'/app.widgets/TElement.php';
require_once __DIR__.'/app.widgets/TTable.php';
require_once __DIR__.'/app.widgets/TTableRow.php';
require_once __DIR__.'/app.widgets/TTableCell.php';

// Matriz de dados
$dados[] = [ 1, 'Maria ', 'http:://www.mar.com.br', 1200 ];
$dados[] = [ 2, 'Pedro ', 'http:://www.ped.com.br', 800 ];
$dados[] = [ 3, 'Joao ', 'http:://www.joa.com.br', 1500 ];
$dados[] = [ 3, 'Joana ', 'http:://www.joan.com.br', 700 ];
$dados[] = [ 3, 'Erasmo ', 'http:://www.era.com.br', 2500 ];

// instancia o objeto tabela
$tabela = new TTable;

// Define algumas propriedades
$tabela->width = 600;
$tabela->border = 1;

// Instancia uma linha para o cabeçalho
$cabecalho = $tabela->addRow();
// Define a cor de fundo
$cabecalho->bgcolor = '#a0a0a0';

$cabecalho->addCell( 'Código' );
$cabecalho->addCell( 'Nome' );
$cabecalho->addCell( 'Site' );
$cabecalho->addCell( 'Salário' );

$i = 0;
$total = 0;

// percorre os dados
foreach ( $dados as $pessoa )
{
	// Verifica qual cor utilizar para o fundo ( zebrado )
	$bgcolor = ( $i % 2 ) == 0 ? '#d0d0d0' : '#ffffff';
	// adiciona uma linha para os dados
	$linha = $tabela->addRow();
	$linha->bgcolor = $bgcolor;
	// Adiciona as celulas
	$linha->addCell( $pessoa[0] );
	$linha->addCell( $pessoa[1] );
	$linha->addCell( $pessoa[2] );
	$x = $linha->addCell( $pessoa[3] );
	$x->align = 'right';
	$total += $pessoa[3];
	$i++;
}
// instancia uma linha para o totalizador
$linha = $tabela->addRow( 'Total' );
$linha->colspan = 3;

$celula = $linha->addCell( $total );
$celula->bgcolor = '#a0a0a0';
$celula->align = 'right';

$tabela->show();