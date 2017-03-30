<?php
// Carregamento de Classes Dinâmicos
function __autoload($class)
{
	// Busca Classes no diretorio de classes
	if (file_exists("app.ado/{$class}.php")) {
		// Inclui a classe do diretorio
		include_once "app.ado/{$class}.php";
		// echo "{$class}.php inserida <br />\n";
	}
	else
	{
		echo "{$class}.php não encontrada <br />\n";
	}
}