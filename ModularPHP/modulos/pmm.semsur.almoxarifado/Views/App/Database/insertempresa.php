<?php
require_once '../auth.php';
require_once '../Models/empresa.class.php';

if(isset($_POST['upload']) == 'Cadastrar'){

$Nomeempresa = $_POST['Nomeempresa'];

//---empresa---//
$CNPJempresa = $_POST['CNPJempresa'];
$Emailempresa = $_POST['Emailempresa'];
$Enderecoempresa = $_POST['Enderecoempresa'];
$Telefoneempresa = $_POST['Telefoneempresa'];

if($Nomeempresa != NULL){

		if (isset($_POST['Nomeempresa'])){

			$empresa->Insertempresa($Nomeempresa, $CNPJempresa, $Emailempresa, $Enderecoempresa, $Telefoneempresa);
			echo 'pagina Insertempresa - gravado';

	}		
	
 }else{
	header('Location: ../../views/empresa/index.php');
}
}
//update

if(isset($_POST['update']) == 'update'){

//---empresa---//
$idempresa = $_POST['idempresa'];
$Nomeempresa = $_POST['Nomeempresa'];
$CNPJempresa = $_POST['CNPJempresa'];
$Emailempresa = $_POST['Emailempresa'];
$Enderecoempresa = $_POST['Enderecoempresa'];
$Telefoneempresa = $_POST['Telefoneempresa'];

echo 'pagina interempresa , IDempresa = '.$idempresa.' <br><br>';

if($idempresa != NULL){

		if (isset($_POST['idempresa'])){

			$empresa->UpdateEmpresa($idempresa, $Nomeempresa, $CNPJempresa, $Emailempresa, $Enderecoempresa, $Telefoneempresa);
			echo '<br><br>pagina interempresa , após class.Empresa - gravado <br><br>';

	}		
	
 }else{
	header('Location: ../../views/empresa/index.php');
}
}
?>