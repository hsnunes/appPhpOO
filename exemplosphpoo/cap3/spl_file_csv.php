<?php 
$dados = array ( 
    array('codigo', 'nome', 'endereco', 'telefone'), 
    array('1', 'Maria da Silva', 'Rua da Maria', '(11) 12345678'), 
    array('2', 'Pedro Cardoso',  'Rua do Pedro', '(11) 12345678'), 
    array('3', 'Joana Pereira',  'Rua da Joana', '(11) 12345678') 
); 

$file = new SplFileObject('dados.csv', 'w'); 
$file->setCsvControl(','); 

foreach ($dados as $linha) { 
    $file->fputcsv($linha); 
}