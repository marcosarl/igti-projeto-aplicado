<?php 
require_once('conexao.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDIJ - Repositório de Documentação e
Informação Jurídica</title>

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

    <hr>
  <center>  <h2> Lista de Usuários </h2> </center>
    <hr>
<center>



<table rules="all">
<thead>
    <tr> 
    <th> NOME </th>
    <th> EMAIL </th>
    <th> SENHA </th>
    <th> NÍVEL </th>
    <th>  </th>
    </tr>
</thead>



<tbody> 


    <?php 
$sql_consulta=mysqli_query($ligar , " SELECT *FROM tb_usuarios ");

    while( $linha=mysqli_fetch_array($sql_consulta)){
        ?>
    <tr>
        <td> <?= $linha[1]  ?></td>
        <td> <?= $linha[2]  ?></td>
        <td> <?= $linha[3] ?></td>
        <td> <?= $linha[4]  ?></td>
        <td><a href="eliminar.php?codigo=<?= $linha[0] ?>" > Exluir </a> </td>
        <td><a href="editar.php?codigo=<?= $linha[0] ?>" > Editar </a> </td>


    </tr>
     
       <?php 
    }

    ?>

</tbody>
</table>

</center>

</body>

</html>