<?php
//se a session não estiver definida ele inicia uma, se não ele n faz nada
(!isset($_SESSION) ? session_start() : "");

//recria/limpa a variavel $_SESSION
$_SESSION = array();

//encerra a session
session_destroy();

//envia para a home
header('location:./?m=home');
