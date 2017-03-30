<?php
// carrega as classes necessárias - __aultoload
include_once 'autoload.php';
/**
 * Cria um filtro por Data (string);
 */
$filter1 = new TFilter( 'data', '=', '2007-06-02' );
echo $filter1->dump();
echo "<br />\n";
// -------------------------->
/**
 * Cria um filtro por Salario (integer);
 */
$filter2 = new TFilter( 'salario', '>', '3000' );
echo $filter2->dump();
echo "<br />\n";
// ------------------------->
/**
 * Cria um filtro por Sexo (array);
 */
$filter3 = new TFilter( 'sexo', 'IN',['M','F'] );
echo $filter3->dump();
echo "<br />\n";
// ------------------------>
/**
 * Cria um filtro por Contrato (NULL);
 */
$filter4 = new TFilter( 'contrato', 'IS NOT', 'NULL' );
echo $filter4->dump();
echo "<br />\n";
// -------------------------->
/**
 * Cria um filtro por Ativo (boolean);
 */
$filter5 = new TFilter( 'ativo', '=', 'TRUE' );
echo $filter5->dump();
echo "<br />\n";