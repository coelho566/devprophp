<?php
$usuarios = new Usuarios();
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $usuarios->excluir($id);

    header("Location: home");
    exit;
}