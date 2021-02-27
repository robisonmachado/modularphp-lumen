<?php
require_once '../auth.php';
require_once '../Models/produtos.class.php';

	if(isset($_POST['update']) == 'Cadastrar'){

		$nomeProduto = $_POST['nomeProduto'];
		
		$DescricaoProduto = $_POST['DescricaoProduto'];

		if($nomeProduto != NULL){
			if(isset($_POST['id'])){
				$id = $_POST['id'];
				$produtos->UpdateProd($id, $nomeProduto, $DescricaoProduto);
		}else{
			$produtos->InsertProd($nomeProduto, $DescricaoProduto);
			}
}else{
header('Location: ../../views/prod/index.php?alert=0');
}
}else{
		header('Location: ../../views/prod/index.php');
	}
