<?php
include_once("../../../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky - Edição do Relatório de V</title>

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
    <h1>Menu de edição do relatório de voo</h1>
    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Mês</th>
                <th>Partida</th>
                <th>Destino</th>
                <th>Solicitante</th>
                <th>Tempo de Voô</th>
                <th>editar</th>
                <th>deletar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $consulta = "SELECT id, data_voo, mes, partida, destino, solicitante, tempo_voo FROM horas_voadas order by id desc limit 30";
                $query = mysqli_query($mysqli, $consulta) or die(mysqli_error($mysqli));

                while ($linha = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $linha['data_voo']?></td>
                        <td><?php echo $linha['mes']?></td>
                        <td><?php echo $linha['partida']?></td>
                        <td><?php echo $linha['destino']?></td>
                        <td><?php echo $linha['solicitante']?></td>
                        <td><?php echo $linha['tempo_voo']?></td>
                        <td><a href="editar_id_formulario.php?id=<?php echo $linha['id']?>">editar</a></td>
                        <td><a href="deletar_id_formulario.php?id=<?php echo $linha['id']?>">deletar</a></td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
    <br><br>
    <button><a href="../../formulario.php">Voltar</a></button>
</body>

</html>