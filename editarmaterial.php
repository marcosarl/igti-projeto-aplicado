<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Editar material</title>		
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
		
		//Receber o número da página
		$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
		$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
		
		//Setar a quantidade de itens por pagina
		$qnt_result_pg = 3;
		
		//calcular o inicio visualização
		$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
		
		$result_materiais = "SELECT * FROM materiais LIMIT $inicio, $qnt_result_pg";
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
			echo "<a href='edit_materiais.php?id=" . $row_materiais['id'] . "'>Editar</a> | ";
			echo "<a href='proc_apagar_materiais.php?id=" . $row_materiais['id'] . "'>Apagar</a><br><hr>";
		}
		
		//Paginção - Somar a quantidade de materiais
		$result_pg = "SELECT COUNT(id) AS num_result FROM materiais";
		$resultado_pg = mysqli_query($ligar, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='editarmaterial.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='editarmaterial.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='editarmaterial.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='editarmaterial.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>
<hr><hr>
  <Center> 
    <a href="inicio.php"> HOME </a> <br>
 </Center> 

<hr>	
	</body>
</html>