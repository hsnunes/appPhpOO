<?php
// var_dump( file_exists( __DIR__.'/app.widgets/TElement.php' ) );
require_once __DIR__.'/app.widgets/TElement.php';

// Inicia um tag HTML e o documento
$html = new TElement( 'html' );

// instancia a seção head
$head = new TElement( 'head' );
$html->add( $head ); // adiciona ao HTML <html>

// Definindo um titulo para pagina
$title = new TElement( 'title' );
$title->add( 'Título da Página' );
$head->add( $title );		// adiciona o objeto ao head

// Inicia o elemento body
$body = new TElement( 'body' );
$body->bgcolor='#FFFFDD';
$html->add( $body );

$center = new TElement( 'center' );
$body->add( $center );

// instancia um paragrafo
$img = new TElement( 'img' );
$img->src='app.images/inter.php';
$img->width='120';
$img->height='120';
$center->add( $img );

// instancia um link
$a = new TElement( 'a' );
$a->href='http://www.internacional.com.br';
$a->add( 'Visite o Site Oficial' );
$center->add( $a );

// instanciar quebras de linhas
$br = new TElement( 'br' );
$center->add( $br );

// instanciando um botão
$input = new TElement( 'input' );
$input->type='button';
$input->value='Clique aqui para saber...';
$input->onclick='alert("Clube do Povo do Rio Grande do Sul")';
$center->add( $input );

// exibe o html
$html->show();

// echo '<pre>';print_r( $html );echo '</pre>';