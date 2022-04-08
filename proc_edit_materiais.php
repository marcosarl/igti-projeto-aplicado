<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$primeiroautor = filter_input(INPUT_POST, 'primeiroautor', FILTER_SANITIZE_STRING);
$segundoautor = filter_input(INPUT_POST, 'segundoautor', FILTER_SANITIZE_STRING);
$fonte = filter_input(INPUT_POST, 'fonte', FILTER_SANITIZE_STRING);
$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_STRING);
$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
$edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_STRING);
$capitulo = filter_input(INPUT_POST, 'capitulo', FILTER_SANITIZE_STRING);
$volume = filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_STRING);
$nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_materiais = "UPDATE materiais SET titulo='$titulo', primeiroautor='$primeiroautor', segundoautor='$segundoautor', fonte='$fonte', pagina='$pagina', local='$local', numero='$numero', ano='$ano', edicao='$edicao', capitulo='$capitulo', volume='$volume', nota='$nota', modified=NOW() WHERE id='$id'";
$resultado_materiais = mysqli_query($ligar, $result_materiais);

if(mysqli_affected_rows($ligar)){
	$_SESSION['msg'] = "<p style='color:green;'>Material editado com sucesso</p>";
	header("Location: editarmaterial.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Material não foi editado com sucesso</p>";
	header("Location: editarmaterial.php?id=$id");
}
