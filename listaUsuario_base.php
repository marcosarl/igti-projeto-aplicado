<?php 
require_once('conexao.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
<title>RDIJ - Repositório de Documentação e
Informação Jurídica</title>

</head>
<body>
    	<div id="area-cabecalho">

		<div id="area-logo">
    
<center>
<Table>
    <th><img width="150" height="100" src="https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-300x215.png" class="attachment-medium size-medium" alt="O GIDJ/SP" loading="lazy" srcset="https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-300x215.png 300w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-1024x733.png 1024w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-768x550.png 768w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-1536x1100.png 1536w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full-2048x1467.png 2048w, https://gidjsp.com.br/wp-content/uploads/2020/08/Logo_GIDISP_full.png 1600w" sizes="(max-width: 300px) 100vw, 300px" title="O GIDJ/SP" /></a><td>
    <th><td>
    <th><td>
    <th><td>
    <th><h1>Repositório de Documentação e <br>Informação Jurídica - RDIJ</h1><td>
</Table>
</center>
		</div>

		<div id="area-menu">
               </div>
        <center><a href="inicio.php">HOME</a>  |  <a href="cadastrar.php">CADASTRAR</a>  |  <a href="pesquisar.php">PESQUISAR</a>  |  <a href="listaUsuario.php">ADMIN</a>  |  <a href="index.html">SAIR</a></center>  
             </div>
                <div id="area-principal"><!-- inicio conteudo -->
		
		<div id="area-postagens">

		<div class="postagem"></div>
                <hr>
                <center> <h2> Lista de usuários </h2> </center>
                <hr>
		<center>

<table rules="all">
<thead>
    <tr> 
    <th> Nome </th>
    <th> E-mail </th>
    <th> Senha </th>
    <th> Nível </th>
    <th> Ação </th>
    </tr>
</thead>



<tbody> 

    <?php 
$sql_consulta=mysqli_query($ligar , " SELECT * FROM tb_usuarios ");
$total =mysqli_num_rows($sql_consulta);
    while( $linha=mysqli_fetch_array($sql_consulta)){
        ?>
    <tr>
        <td> <?= $linha[1]  ?></td>
        <td> <?= $linha[2]  ?></td>
        <td> <?= $linha[3] ?></td>
        <td> <?= $linha[4]  ?></td>
        <td><a href="editar.php?codigo=<?= $linha[0] ?>" >Editar</a>    |    <a href="eliminar.php?codigo=<?= $linha[0] ?>" >Exluir</a></td>


    </tr>
    
     
       <?php 
    }

    ?>
<br>
        <tr>  
       <td colspan="6" >   TOTAL DE REGISTROS:  <?= $total  ?> </td>
       </tr>
</tbody>
</table>

</center>

                  </div><!-- fim conteudo -->
	</div><br>

	<div id="rodape">
		2021 - marcosarl.com - Todos os direitos reservados.
	</div>

</body>
</html>