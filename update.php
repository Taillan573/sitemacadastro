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
        $nome = strip_tags(trim($_POST['nome']));
        $idade = strip_tags(trim($_POST['idade']));
        $email = strip_tags(trim($_POST['email']));
        $senha = strip_tags(trim($_POST['senha']));

        try {
            $q_insert = $pdo->prepare('UPDATE PESSOA SET nome=:nome,idade=:idade,senha=:senha where email=:email');
            $q_insert->bindValue(':nome', $nome);
            $q_insert->bindValue(':idade', $idade);
            $q_insert->bindValue(':email', $email);
            $q_insert->bindValue(':senha', $senha);
            $q_insert->execute();
            echo $q_insert->rowCount();


            echo "<script>alert('Cliente sucesso')</script>";
       } catch (PDOException $ex) {

            var_dump($ex);
        }
    }
    ?>
    <body>


        <div align="center">
            <form enctype="multipart/form-data" name="inserir" method="post" >
                <label for="inputNome" >Nome: </label>
                <input type="text" name="nome" placeholder="Nome" autofocus/>
                <label for="inputIdade"  >Idade:</label>
                <input type="text" name="idade"  placeholder="Idade">
                <label for="inputEmail" >Email: </label>
                <input type="text" name="email" placeholder="Email">
                <label for="inputSenha" >Senha:</label>
                <input type="password" name="senha" placeholder="Senha">
                <button type="submit" name="enviar" >Cadastrar</button>
                <p style="color: #fff;padding-top: 40px;">&copy; 2017-2018</p>
            </form>
        </div>
    </body>
</html>
