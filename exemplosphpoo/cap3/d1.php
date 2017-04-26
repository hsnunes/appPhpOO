<?php 
require_once 'a1.php'; 
require_once 'b1.php'; 
require_once 'c1.php'; 

use Library\Widgets\Field; 
use Library\Widgets\Form; 
use Library\Container\Table; 

var_dump(new Field); // object(Library\Widgets\Field) 
var_dump(new Form);  // object(Library\Widgets\Form) 
var_dump(new Table); // object(Library\Container\Table) 

$f = new Form; 
$f->show();