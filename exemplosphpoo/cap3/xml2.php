<?php
// interpreta o documento XML
$xml = simplexml_load_file('paises.xml');

// exibe os atributos do objeto criado
echo 'Nome : '     . $xml->nome      . "<br>\n";
echo 'Idioma : '   . $xml->idioma    . "<br>\n";
echo 'Capital : '  . $xml->capital   . "<br>\n";
echo 'Moeda : '    . $xml->moeda     . "<br>\n";
echo 'Prefixo : '  . $xml->prefixo   . "<br>\n";