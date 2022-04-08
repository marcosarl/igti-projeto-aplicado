<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Pesquisar material</title>		
	</head>
	<body>
		<center><h1>Gestão de Conteúdo [GIDJSP]</h1></center>

                <center><a href="cadastrar.php">Cadastrar Material</a>  |  <a href="pesquisar.php">Pesquisar Material</a>  |  <a href="editarmaterial.php">Editar Material</a>  |  <a href="listaUsuario.php">Usuários</a>  |  <a href="index.html">Sair</a></center> 

                <hr>
                <center> <h2> Pesquisar material </h2> </center>
                <hr>
		<center>
		<form method="POST" action="">
			<label><strong>Pesquisa: </strong></label>
			<input type="text" name="titulo" placeholder="Digite o nome"> <input name="SendPesqUser" type="submit" value="Pesquisar">
		</form></center>
		
		<?php
		$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
		if($SendPesqUser){
			$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
			$result_materiais = "SELECT * FROM materiais WHERE titulo LIKE '%$titulo%'";
			$resultado_materiais = mysqli_query($ligar, $result_materiais);
			while($row_materiais = mysqli_fetch_assoc($resultado_materiais)){
				echo "<strong>id: </strong>" . $row_materiais['id'] . "<br>";
				echo "<strong>Titulo: </strong>" . $row_materiais['titulo'] . "<br>";
				echo "<strong>Autor 1: </strong>" . $row_materiais['autor1'] . "<br>";
				echo "<strong>Autor 2: </strong>" . $row_materiais['autor2'] . "<br>";
				echo "<strong>Fonte: </strong>" . $row_materiais['fonte'] . "<br>";
				echo "<strong>Página: </strong>" . $row_materiais['pagina'] . "<br>";
				echo "<strong>Local: </strong>" . $row_materiais['local'] . "<br>";
				echo "<strong>Número: </strong>" . $row_materiais['numero'] . "<br>";
				echo "<strong>Ano: </strong>" . $row_materiais['ano'] . "<br>";
				echo "<strong>Edição: </strong>" . $row_materiais['edicao'] . "<br>";
				echo "<strong>Capítulo: </strong>" . $row_materiais['capitulo'] . "<br>";
				echo "<strong>Nota: </strong>" . $row_materiais['nota'] . "<br><br>";
				echo "<a href=\"arquivos/teste.pdf\" target=\"_blank\">Visualizar Arquivo N</a><br><hr>";
			}
		}
		?>
<hr> 
<Center> 
    <a href="inicio.php"> HOME </a> <br>
 </Center> 

<hr>
	</body>
</html>