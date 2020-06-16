<?php
$_GET['id'] = isset($_GET['id']) ? $_GET['id'] : 0;
require_once 'inc/config.php';
$classe = isset($_GET['classe']) ? $_GET['classe'] : 'Cliente';
require_once "controller/".$classe."Controller.php";
$controller = $classe."Controller";
$app = new $controller();
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'all';
$app->$acao();






