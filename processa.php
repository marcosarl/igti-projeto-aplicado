<?php
session_start();
include_once("conexao.php");

// print_r("<pre>");
// print_r($_FILES);
// exit(0);

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$primeiroautor = filter_input(INPUT_POST, 'primeiroautor', FILTER_SANITIZE_STRING);
$segundoautor = filter_input(INPUT_POST, 'segundoautor', FILTER_SANITIZE_STRING);
$fonte = filter_input(INPUT_POST, 'fonte', FILTER_SANITIZE_STRING);
$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$local = filter_input(INPUT_POST, 'local', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
$edicao = filter_input(INPUT_POST, 'edicao', FILTER_SANITIZE_STRING);
$capitulo = filter_input(INPUT_POST, 'capitulo', FILTER_SANITIZE_STRING);
$volume = filter_input(INPUT_POST, 'volume', FILTER_SANITIZE_STRING);
$nota = filter_input(INPUT_POST, 'nota', FILTER_SANITIZE_STRING);
$nomedoarquivo = "";
if(isset($_FILES["arquivoEnviado"] ["name"])){
$nomedoarquivo = ($_FILES["arquivoEnviado"] ["name"]);
move_uploaded_file($_FILES["arquivoEnviado"] ["tmp_name"], __DIR__ . "/arquivos/" . basename($_FILES['arquivoEnviado']['name']));
}

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_materiais = "INSERT INTO materiais (titulo, primeiroautor, segundoautor, fonte, pagina, local, numero, ano, edicao, capitulo, volume, nota, link, created) VALUES ('$titulo', '$primeiroautor', '$segundoautor', '$fonte', '$pagina', '$local', '$numero', '$ano', '$edicao', '$capitulo', '$volume', '$nota', '$nomedoarquivo', NOW())";
$resultado_materiais = mysqli_query($ligar, $result_materiais);

if(mysqli_insert_id($ligar)){
	$_SESSION['msg'] = "<p style='color:green;'>Material cadastrado com sucesso</p>";

	// Procurar o numero Id do último registro incluido
	//-------------------------------------------------
	$ultimoId = 84;

	// Já que incluiu no banco de dados, tem que fazer o upload do arquivo.
	//---------------------------------------------------------------------
	//move_upload(
	//$nomeArquivo = $ultimoId . "_".$nomeArquivoArmazenado;


	header("Location: cadastrar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Material não foi cadastrado com sucesso</p>";
	header("Location: cadastrar.php");
}
