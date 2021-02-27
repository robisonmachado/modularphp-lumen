<?php
//session_start(); //Iniciando a sessão
//var_dump('App/auth');
if(!isset($_SESSION["idUsuario"]) || !isset($_SESSION["usuario"])){
    //var_dump('App/auth 2');
 			header('Location: ../');
}else{

    //var_dump('App/auth 3');

	$idUsuario = $_SESSION["idUsuario"];
	$usuario   = $_SESSION["usuario"];
	$perm	   = $_SESSION["perm"];
	$foto      = $_SESSION["foto"];

}


