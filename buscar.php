<?php
include("conexao.php");
$pdo=conectar();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <title>Inserir</title>
        <style type="text/css">
            label{
                display: block;
            }

            input{
                display: block;
            }

        </style>
    </head>
        <?php
        if(isset($_POST['enviar'])){
            $id = strip_tags(trim($_POST['id']));
            ?>
            <table width="100%" border="0">
                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
                <?php
                $buscarusuarios=$pdo->prepare("SELECT * FROM pessoa WHERE id=:id");
                $buscarusuarios->bindValue(":id",$id);
                $buscarusuarios->execute();
                $result=$buscarusuarios->fetchAll(PDO::FETCH_ASSOC);
                var_dump($result);
                /*if(mysql_num_rows($buscarusuarios) == 0){
                echo"Nenhum usuário cadastrado no sistema!";
                }else{
                    while($linha=mysql_fetch_array($buscarusuarios)){
                ?>
                <tr>
                    <td><?php echo $linha["nome"];?></td>
                    <td><?php echo $linha["status"];?></td>
                    <td><?php $id=$linha["id"]; 
                   /* if($linha["status"] == 0){ 
                        echo "<a href=\"index.php?acao=aprovar&amp;id=$id\">Aprovar</a>";
                    }else{
                        echo"<a href=\"index.php?acao=bloquear&amp;id=$id\">Bloquear</a>";
                    }*/
                    ?>
                    </td>
                </tr>
                <?php  }?>
            </table>
    <body>


        <div align="center">
            <form enctype="multipart/form-data" name="inserir" method="post" >
                <label for="inputEmail" >Email: </label>
                <input type="text" name="id" placeholder="id">
                <button type="submit" name="enviar" >Apagar</button>
            </form>
        </div>
    </body>
</html>