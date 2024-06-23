<?php
include_once("../../../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky - Edição das Observações</title>

    <style>
        table, th, td {
            border: 1px solid black;
        }
        th,td {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Menu de edição das observações</h1>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Observação</th>
                <th>Página Indicada</th>
                <th>editar</th>
                <th>deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $consulta = "SELECT id, data_obs, tipo, comentario FROM observacao order by id desc limit 30";
                $query = mysqli_query($mysqli, $consulta) or die(mysqli_error($mysqli));

                while ($linha = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $linha['data_obs']?></td>
                        <td><?php echo $linha['tipo']?></td>
                        <td><?php echo $linha['comentario']?></td>
                        <td><a href="editar_id_observacao.php?id=<?php echo $linha['id']?>">editar</a></td>
                        <td><a href="deletar_id_observacao.php?id=<?php echo $linha['id']?>">deletar</a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <br><br>
    <button><a href="../../observacao.php">Voltar</a></button>
</body>

</html>