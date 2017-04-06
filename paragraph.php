<?php
require_once __DIR__.'/app.widgets/TElement.php';
require_once __DIR__.'/app.widgets/TParagraph.php';

// criando instancias de textos
$texto1 = new TParagraph( 'Teste1<br>teste1<br>teste1' );
$texto1->setAlign( 'left' );
$texto1->show();

$texto2 = new TParagraph( 'Teste2<br>teste2<br>teste2' );
$texto2->setAlign( 'right' );
$texto2->show();