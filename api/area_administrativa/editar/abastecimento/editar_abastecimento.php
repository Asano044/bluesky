<?php
include_once("../../../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky - Edição do Abastecimento</title>

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
    <h1>Menu de edição do Abastecimento</h1>
    <table>
        <thead>
            <tr>
                <th>Data Abastecimento</th>
                <th>Local</th>
                <th>Solicitante</th>
                <th>NF</th>
                <th>Data Vencimento</th>
                <th>Valor</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $consulta = "SELECT id, data_abastecimento, local, solicitante, nf, data_vencimento, valor FROM abastecimentos order by id desc limit 30";
                $query = mysqli_query($mysqli, $consulta) or die(mysqli_error($mysqli));

                while ($linha = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $linha['data_abastecimento']?></td>
                        <td><?php echo $linha['local']?></td>
                        <td><?php echo $linha['solicitante']?></td>
                        <td><?php echo $linha['nf']?></td>
                        <td><?php echo $linha['data_vencimento']?></td>
                        <td><?php echo number_format($linha['valor'], 2, ',', '.')?></td>
                        <td><a href="editar_id_abastecimento.php?id=<?php echo $linha['id']?>">editar</a></td>
                        <td><a href="deletar_id_abastecimento.php?id=<?php echo $linha['id']?>">deletar</a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <br><br>
    <button><a href="../../cad_abastecimento.php">Voltar</a></button>
</body>

</html>