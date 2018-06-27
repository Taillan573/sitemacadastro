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
    if (isset($_POST['enviar'])) {
        $id = strip_tags(trim($_POST['id']));
        $email = strip_tags(trim($_POST['email']));
        
        try {
            $delete = $pdo->prepare('DELETE FROM pessoa where id=:id and email=:email');
            $delete->bindValue(':id', $id);
            $delete->bindValue(':email', $email);
            $delete->execute();
        if ($delete->rowCount()> 0) {
            echo "Usuario deletado com sucesso";
        }else{
            echo "Pessoa nao deletada";
        }
        
       } catch (PDOException $ex) {

            var_dump($ex);
        }
    }
    ?>
    <body>


        <div align="center">
            <form enctype="multipart/form-data" name="inserir" method="post" >
                <label for="inputEmail" >Email: </label>
                <input type="text" name="id" placeholder="id">
                <label for="inputEmail" >Email: </label>
                <input type="text" name="email" placeholder="Email">
                <button type="submit" name="enviar" >Apagar</button>
            </form>
        </div>
    </body>
</html>