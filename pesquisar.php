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
	<center>
<Table>
    <th><img width="150" height="100" src="https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-300x215.png" class="attachment-medium size-medium" alt="O GIDJ/SP" loading="lazy" srcset="https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-300x215.png 300w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-1024x733.png 1024w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-768x550.png 768w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-1536x1100.png 1536w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-2048x1467.png 2048w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full.png 1600w" sizes="(max-width: 300px) 100vw, 300px" title="O GIDJ/SP" /></a><td>
    <th><td>
    <th><td>
    <th><td>
    <th><h1>Repositório de Documentação e <br>Informação Jurídica - RDIJ</h1><td>
</Table>
<br>
</center>

		<center><a href="cadastrar.php">CADASTRAR</a>  |  <a href="pesquisar.php">PESQUISAR</a>  |  <a href="editarmaterial.php">EDITAR</a>  |  <a href="listaUsuario.php">ADMIN</a>  |  <a href="index.html">SAIR</a></center> 

                <hr>
                <center> <h2> Pesquisar material </h2> </center>
                <hr>
		<center>
		<form method="POST" action="">
			<label><strong>Pesquisa: </strong></label>
			<input type="text" name="titulo" size="60" maxlength="9999" placeholder="Digite o nome"> <input name="SendPesqMat" type="submit" value="Pesquisar">
		</form></center>
		
		<?php
		$SendPesqMat = filter_input(INPUT_POST, 'SendPesqMat', FILTER_SANITIZE_STRING);
		if($SendPesqMat){
			$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
			$result_materiais = "SELECT * FROM materiais WHERE titulo LIKE '%$titulo%'";
			$resultado_materiais = mysqli_query($ligar, $result_materiais);
			while($row_materiais = mysqli_fetch_assoc($resultado_materiais)){
				echo "<strong>id: </strong>" . $row_materiais['id'] . "<br>";
				echo "<strong>Titulo: </strong>" . $row_materiais['titulo'] . "<br>";
				echo "<strong>Primeiro Autor: </strong>" . $row_materiais['primeiroautor'] . "<br>";
				echo "<strong>Segundo Autor: </strong>" . $row_materiais['segundoautor'] . "<br>";
				echo "<strong>Fonte: </strong>" . $row_materiais['fonte'] . "<br>";
				echo "<strong>Página: </strong>" . $row_materiais['pagina'] . "<br>";
				echo "<strong>Local: </strong>" . $row_materiais['local'] . "<br>";
				echo "<strong>Número: </strong>" . $row_materiais['numero'] . "<br>";
				echo "<strong>Ano: </strong>" . $row_materiais['ano'] . "<br>";
				echo "<strong>Edição: </strong>" . $row_materiais['edicao'] . "<br>";
				echo "<strong>Capítulo: </strong>" . $row_materiais['capitulo'] . "<br>";
				echo "<strong>Volume: </strong>" . $row_materiais['volume'] . "<br>";
				echo "<strong>Nota: </strong>" . $row_materiais['nota'] . "<br><br>";
				// echo "<a href=\"arquivos/teste.pdf\" target=\"_blank\">Visualizar Arquivo N</a><br><hr>";
				if(!empty($row_materiais['link'])){
					echo "<a href=\"arquivos/" . $row_materiais['link'] . "\" target=\"_blank\">Visualizar Arquivo</a>";
				}
				echo "<hr>";
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