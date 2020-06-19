<?php

require_once '../Controller/MessageController.php';
require_once '../Controller/UserController.php';

if(array_key_exists('action', $_GET) && array_key_exists('method', $_GET)) {
    $class = $_GET['action'];
    $method = $_GET['method'];

        if(!class_exists($class)) {
            echo 'Não possui classe';
        }else if(!method_exists(new $class, $method)) {
            echo 'Não possui metodo';
            
        } else {
            $controller = new $class;
            $controller->$method();
        }
} else {
    echo 'Não possui valores';
}