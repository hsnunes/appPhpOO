<?php
include_once 'app.widgets/TElement.php';
include_once 'app.widgets/TImage.php';
include_once 'app.widgets/TTable.php';
include_once 'app.widgets/TTableRow.php';
include_once 'app.widgets/TTableCell.php';
include_once 'app.widgets/TParagraph.php';

// instancia objeto tabela com borda de 1px
$tabela = new TTable;
$tabela->border=1;

// adicionando uma linha
$linha1 = $tabela->addRow();
// cria um objeto paragrafo
$paragrafo = new TParagraph('Este é o logo do Gnome');
$paragrafo->setAlign( 'left' );
// adiciona celulas contendo o objeto
$linha1->addCell( $paragrafo );

// cria um objeto imagem
$imagem = new TImage( 'app.images/gnome.png' );
$linha1->addCell( $imagem );

// Acrescenta uma linha na tabela
$linha2 = $tabela->addRow();

// Cria um objeto paragrafo
$paragrafo = new TParagraph( 'Este é o logo do Gimp' );
$paragrafo->setAlign('left');
$linha2->addCell($paragrafo);

// Cria um objeto imagem
$imagem = new TImage( 'app.images/gimp.png' );
$linha2->addCell($imagem);

// Acrescenta uma linha na tabela
$linha3 = $tabela->addRow();
// Acrescenta uma celula com o espaço de 2
$celula = $linha3->addCell( new TParagraph( 'Texto em duas colunas' ) );
$celula->colspan = 2;

// exibe a tabela
$tabela->show();