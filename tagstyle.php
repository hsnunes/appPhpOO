<?php
require_once __DIR__.'/app.widgets/TElement.php';
require_once __DIR__.'/app.widgets/TStyle.php';

// cria um estilo
$style = new TStyle( 'estilo_texto' );
$style->color = '#FF0000';
$style->font_family = 'Verdana';
$style->font_size = '20pt';
$style->font_weight = 'bold';
$style->show();

// instancia um paragrafo
$texto = new TElement( 'p' );
$texto->align = 'center';
$texto->add( 'Sport Club Internacional' );

$texto->class = 'estilo_texto';
$texto->show();