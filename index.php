<?php
session_start();
require 'config.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>DevPro</title>
</head>
<body>
<?php

    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    if (file_exists('pages/'.$url.'.php')){
        include ('pages/'.$url.'.php');
    }else{
        echo "ERRO 404";
    }

?>

    <script src="assets/js/style.js"></script>
</body>
</html>