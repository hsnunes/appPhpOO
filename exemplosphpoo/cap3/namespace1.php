<?php 
// declaração 
namespace Application; 
class Form {} 

namespace Components; 
class Form {} 

// utilização 
var_dump( new Form ); // Ex 1: object(Components\Form) 
var_dump( new \Components\Form ); // Ex 2: object(Components\Form) 
var_dump( new \Application\Form ); // Ex 3: object(Application\Form) 
var_dump( new \SplFileInfo('/etc/shaddow') ); // Ex 4: object(SplFileInfo) 
var_dump( new SplFileInfo('/etc/shaddow') ); // Ex 5: Fatal error: Class 'Components\SplFileInfo'