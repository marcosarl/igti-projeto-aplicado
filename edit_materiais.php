<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_materiais = "SELECT * FROM materiais WHERE id = '$id'";
$resultado_materiais = mysqli_query($ligar, $result_materiais);
$row_materiais = mysqli_fetch_assoc($resultado_materiais);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar materiais</title>		
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
</center>
<br>
		<center><a href="cadastrar.php">CADASTRAR</a>  |  <a href="pesquisar.php">PESQUISAR</a>  |  <a href="editarmaterial.php">EDITAR</a>  |  <a href="listaUsuario.php">ADMIN</a>  |  <a href="index.html">SAIR</a></center> 

                <hr>
                <center> <h2> Editar material </h2> </center>
                <hr>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_edit_materiais.php">
			<input type="hidden" name="id" value="<?php echo $row_materiais['id']; ?>">

			<label><strong>Titulo: </strong></label>
			<input type="text" name="titulo" size="100" maxlength="9999" placeholder="Digite o titulo" value="<?php echo $row_materiais['titulo']; ?>"><br><br>
			
			<label><strong>Primeiro Autor: </strong></label>
			<input type="text" name="primeiroautor" size="50" maxlength="9999" placeholder="Digite o primeiro autor" value="<?php echo $row_materiais['primeiroautor']; ?>">

                        <label><strong>Segundo Autor: </strong></label>
			<input type="text" name="segundoautor" size="50" maxlength="9999" placeholder="Digite o segundo autor" value="<?php echo $row_materiais['segundoautor']; ?>"><br><br>

			<label><strong>Fonte: </strong></label>
			<input type="text" name="fonte" size="50" maxlength="9999" placeholder="Digite a fonte" value="<?php echo $row_materiais['fonte']; ?>">

                        <label><strong>Página: </strong></label>
			<input type="text" name="pagina" size="50" maxlength="9999" placeholder="Digite a página" value="<?php echo $row_materiais['pagina']; ?>"><br><br>

			<label><strong>Local: </strong></label>
			<input type="text" name="local" size="50" maxlength="9999" placeholder="Digite o local" value="<?php echo $row_materiais['local']; ?>">

                        <label><strong>Número: </strong></label>
			<input type="text" name="numero" size="50" maxlength="9999" placeholder="Digite o número" value="<?php echo $row_materiais['numero']; ?>"><br><br>

			<label><strong>Ano: </strong></label>
			<input type="text" name="ano" size="50" maxlength="9999" placeholder="Digite o ano" value="<?php echo $row_materiais['ano']; ?>">

                        <label><strong>Edição: </strong></label>
			<input type="text" name="edicao" size="50" maxlength="9999" placeholder="Digite a edição" value="<?php echo $row_materiais['edicao']; ?>"><br><br>

			<label><strong>Capítulo: </strong></label>
			<input type="text" name="capitulo" size="50" maxlength="9999" placeholder="Digite o capitulo" value="<?php echo $row_materiais['capitulo']; ?>">

                        <label><strong>Volume: </strong></label>
			<input type="text" name="volume" size="50" maxlength="9999" placeholder="Digite o volume" value="<?php echo $row_materiais['volume']; ?>"><br><br>

			<label><strong>Nota: </strong></label>
			<input type="text" name="nota" size="100" maxlength="9999" placeholder="Digite a nota" value="<?php echo $row_materiais['nota']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
 <hr>
 <Center> 
    <a href="inicio.php"> HOME </a> <br>
 </Center> 

<hr>
	</body>
</html>