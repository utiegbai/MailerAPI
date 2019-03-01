<?php
/** Author: Uti Mac
* Email: utiegbai@gmail.com
*/
session_start();

spl_autoload_register(function($classname){
    if (file_exists('classes/class.'.strtolower($classname).'.php')) {
        require_once('classes/class.'.strtolower($classname).'.php');
    } elseif (file_exists('../classes/class.'.strtolower($classname).'.php')) {
        require_once('../classes/class.'.strtolower($classname).'.php');
    }
});

?>