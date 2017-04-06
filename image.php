<?php
require_once __DIR__.'/app.widgets/TElement.php';
require_once __DIR__.'/app.widgets/TImage.php';

// instancia o objeto imagem
$gnome = new TImage( 'app.images/gnome.png' );
// exibe objeto imagem
$gnome->show();

$gimp = new TImage( 'app.images/gimp.png' );
$gimp->show();