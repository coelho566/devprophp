<?php

    spl_autoload_register(function($class){
        $files = "classes/".$class.".php";
        if(file_exists($files)){
            require $files;
        }
    });

    global $pdo;

try {
    
    $pdo = new PDO("mysql:dbname=devpro;host=localhost","root","");
    
    
} catch(PDOException $e){

    echo "ERRO: ".$e->getMessage();
    exit;
}