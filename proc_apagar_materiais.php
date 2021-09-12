<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_materiais = "DELETE FROM materiais WHERE id='$id'";
	$resultado_materiais = mysqli_query($ligar, $result_materiais);
	if(mysqli_affected_rows($ligar)){
		$_SESSION['msg'] = "<p style='color:green;'>Material apagado com sucesso</p>";
		header("Location: editarmaterial.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o material não foi apagado com sucesso</p>";
		header("Location: editarmaterial.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um material</p>";
	header("Location: editarmaterial.php");
}
