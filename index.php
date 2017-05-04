<?php

spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Model') > 0 ){
        include 'app/models/'.$class_name.'.php';
    }else{
        include 'app/controller/'.$class_name.'.php';
    }
});

ini_set('display_errors', 1);
require_once 'app/bootstrap.php';