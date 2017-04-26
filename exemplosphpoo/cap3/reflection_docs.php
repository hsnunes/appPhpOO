<?php 
$classes = spl_classes(); // lista classes da SPL 

foreach ($classes as $classe) { 
    $rc = new ReflectionClass( $classe ); 
    print $classe . PHP_EOL; 
    
    foreach ($rc->getMethods() as $method) { 
        print '    ' . $method->getName(); 
        
        print '('; 
        $paramNames = array(); 
        $parameters = $method->getParameters(); 
        if (count($parameters)>0) { 
            foreach ($parameters as $parameter) { 
                if ($parameter->isOptional()) { 
                    $paramNames[] = '[' . $parameter->getName() . ']'; 
                } else { 
                    $paramNames[] = $parameter->getName(); 
                } 
                
            } 
        } 
        print implode(', ', $paramNames); 
        print ')'; 
        print '<br>' . PHP_EOL; 
    } 
}