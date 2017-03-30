<?php
// carrega as classes necessárias
include_once 'autoload.php';
// aqui vemos um exemplo de critério utilizando o operador lógico OR
// a idade deve ser menos que 16 ou maior que 60
$criteria = new TCriteria;
$criteria->add( new TFilter('idade', '<', 16), TExpression::OR_OPERATOR );
$criteria->add( new TFilter('idade','>',60), TExpression::OR_OPERATOR );
echo $criteria->dump();
echo "<br />\n";
// --------------------------- >
// aqui vemos um exemplo de cirtério utilizando o operador lógico AND
// juntamente com os operadores de conjunto IN (dentro do conjunto) e NOT IN (fora do conjunto)
// a idade deve estar dentro do conjunto (24,25,26) e deve estar fora do conjunto (10)
$criteria = new TCriteria;
$criteria->add( new TFilter('idade','IN',[24,25,26]));
$criteria->add( new TFilter('idade','NOT IN',[10]));
echo $criteria->dump();
echo "<br />\n";
// ---------------------------------->
// aqui vemos um exemplo de critério utilizando o operador de comparação LIKE
// o nome deve inicial por pedro ou maria
$criteria = new TCriteria;
$criteria->add( new TFilter('nome','LIKE','pedro%'), TExpression::OR_OPERATOR );
$criteria->add( new TFilter('nome','LIKE','maria%'), TExpression::OR_OPERATOR );
echo $criteria->dump();
echo "<br />\n";
// ---------------------------------->
// aqui vemos um exemplo de critério utilizando o operadores "=" ou 'IS NOT'
// neste caso o telefone não deve conter o valor NULO (IS NOT NULL)
// e o sexo de veser feminino (SEXO='F')
$criteria = new TCriteria;
$criteria->add( new TFilter('telefone','IS NOT',NULL) );
$criteria->add( new TFilter('sexo','=','F'), TExpression::OR_OPERATOR );
echo $criteria->dump();
echo "<br />\n";
// ---------------------------------->
// aqui vemos um exemplo de critério utilizando o operador de comparação IN e NOT IN juntamente com
// conjunto de strings. Neste caso, a UF deve deve estar entre (RS, SC e PR) E
// não deve estar entre (AC e PI)
$criteria = new TCriteria;
$criteria->add( new TFilter('UF','IN',['RS','SC','PR']));
$criteria->add( new TFilter('UF','NOT IN',['AC','PI']) );
echo $criteria->dump();
echo "<br />\n";
// ---------------------------------->
// neste caso temos um uso de criterio composto
// o primeiro critério aponta para o sexo 'F'
// (SEXO feminino) e idade > 18 (maior de idade)
$criteria1 = new TCriteria;
$criteria1->add( new TFilter('sexo','= ','F') );
$criteria1->add( new TFilter('idade','>',18) );
echo $criteria1->dump();
echo "<br />\n";
// ---------------------------------->
// o segundo criterio aponta para o sexo = M (masculino)
// e idade < 16 (meno de idade)
$criteria2 = new TCriteria;
$criteria2->add( new TFilter('sexo','= ','M') );
$criteria2->add( new TFilter('idade','<',16) );
echo $criteria2->dump();
echo "<br />\n";
// ---------------------------------->
// agora juntando os dois critérios utilizando o operador lógico OR (ou)
// o resultado deve conter "mulheres maiores de 18 ou homens menores que 16"
$criteria = new TCriteria;
$criteria->add( $criteria1, TExpression::OR_OPERATOR );
$criteria->add( $criteria2, TExpression::OR_OPERATOR );
echo $criteria->dump();
echo "<br />\n";