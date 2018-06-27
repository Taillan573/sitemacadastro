<?php
include("conexao.php");
$pdo = conectar();
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

            table{
                margin-top: 10px;
            }

        </style>


    </head>
    <body>


        <div align="center">
            <form enctype="multipart/form-data" name="inserir" method="post" >
                <label for="inputEmail" >Email: </label>
                <input type="text" name="id" placeholder="id">
                <button type="submit" name="enviar" >Buscar</button>
            </form>
        </div>
    </body>
    <?php
    if (isset($_POST['enviar'])) {
        $id = strip_tags(trim($_POST['id']));
        if (empty($id)) {
            # code...
            ?>

            <table align="center" border="3">
                <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Email</th>
                        <th>Ação</th>
                </tr>
                <?php
                $buscarusuarios = $pdo->prepare("SELECT * FROM pessoa ");
                $buscarusuarios->bindValue(":id", $id);
                $buscarusuarios->execute();
                $result = $buscarusuarios->fetchAll(PDO::FETCH_ASSOC);

                if ($buscarusuarios->rowCount() == 0) {
                    echo"Nenhum usuário cadastrado no sistema!";
                } else {
                    foreach ($result as &$value) {
                        ?>
                        <tr>
                            <td><?php echo $value["nome"]; ?></td>
                            <td><?php echo $value["idade"]; ?></td>
                            <td><?php echo $value["email"]; ?></td>
                        </tr>
                    <?php
                    }
                }
            } else {
                ?>

                <table align="center" border="3">
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Email</th>
                        <th>Ação</th>
                    </tr>
                    <?php
                    $buscarusuarios = $pdo->prepare("SELECT * FROM pessoa where id=:id");
                    $buscarusuarios->bindValue(":id", $id);
                    $buscarusuarios->execute();
                    $result = $buscarusuarios->fetchAll(PDO::FETCH_ASSOC);

                    if ($buscarusuarios->rowCount() == 0) {
                        echo"Nenhum usuário cadastrado no sistema!";
                    } else {
                        foreach ($result as &$value) {
                            ?>
                            <tr>
                                <td><?php echo $value["nome"]; ?></td>
                                <td><?php echo $value["idade"]; ?></td>
                                <td><?php echo $value["email"]; ?></td>
                            </tr>
                        <?php
                        }
                    }
                }
            }
            ?>
        </table>

</html>