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
  <center>  <h2> Lista de Usuários </h2> </center>
    <hr>
<center>
<?php 

require_once('conexao.PHP');

$codigo= $_GET['codigo'];
$sql_consulta=mysqli_query($ligar, "SELECT *FROM tb_usuarios WHERE id='$codigo' ");
$resultado=mysqli_fetch_array($sql_consulta);

?>

<center>  NOME:  <?=$resultado[1]   ?>  <center>
<hr>

<br>
<center>
<form  method="POST" action="atualizar.php">
    <input type="hidden" name="txtcodigo"   value='<?=$resultado[0]   ?>'>
    Usuário: <br>
    <input type="text" name="usuario"   value='<?=$resultado[1]   ?>' ><br>
    E-mail: <br>
    <input type="email" name="email"    value='<?=$resultado[2]   ?>'><br>
    Senha: <br>
    <input type="password" name="senha"   value='<?=$resultado[3]   ?>' ><br> 
    Nível: <br>
    <select name="nivel" > 
       
        <option value="<?=$resultado[4]   ?>" >   <?=$resultado[4]   ?></option>
             <option value="Admin">  Administrador    </option>
            <option value="Conselho">   Conselho  </option>
            <option value="Membro">  Membro    </option>
    </select>
    <br> <br>
    <input type="submit" value="Atualizar"><center>

                  </div><!-- fim conteudo -->
	</div><br>

	<div id="rodape">
		2021 - marcosarl.com - Todos os direitos reservados.
	</div>

</body>
</html>
