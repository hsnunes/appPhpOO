<?php 
require_once 'a.php'; 
require_once 'b.php'; 

use Application\Form as Form; 
use Application\Field as Field; 
var_dump( new Form );  // object(Application\Form) 
var_dump( new Field ); // object(Application\Field) 

use Components\Form as ComponentForm; 
var_dump( new ComponentForm ); // object(Components\Form) 
var_dump( new Application\Form ); 
var_dump( new Components\Form );