<?php
include_once ("../../../conexao.php");

if (!empty($_GET["id"])) {
    $id = $_GET['id'];

    $consulta_id = "SELECT * FROM observacao WHERE id = $id";
    $query_id = mysqli_query($mysqli, $consulta_id) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($query_id) > 0) {
        while ($linha = mysqli_fetch_array($query_id)) {
            $id = $linha["id"];
            $data_obs = $linha["data_obs"];
            $comentario = $linha["comentario"];
            $tipo = $linha["tipo"];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando | Blue Sky</title>
</head>

<body>

    <form method="post" action="editar_id_observacao.php">
        <input type="date" value="<?php echo $data_obs ?>" name="data_obs" id="data_obs">
        <select name="tipo" id="tipo">
            <option value="">Observações</option>
            <option value="balanco">Observações Balanço</option>
            <option value="rel_voo">Observações Relatório de voo</option>
        </select>
        <input type="text" value="<?php echo $comentario ?>" name="comentario">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <input type="submit" value="Enviar" name="editar_btn">

        <?php
        if (isset($_POST["editar_btn"])) {
            if (
                !empty($_POST["data_obs"])
                and !empty($_POST["tipo"])
                and !empty($_POST["comentario"])
            ) {
                $id = $_POST['id'];
                $data_obs = $_POST['data_obs'];
                $tipo = $_POST['tipo'];
                $comentario = $_POST['comentario'];

                $inserir = "UPDATE observacao SET data_obs='$data_obs', tipo='$tipo', comentario='$comentario' WHERE id = $id";
                $query = mysqli_query($mysqli, $inserir) or die(mysqli_error($mysqli));

                header("Location: editar_observacao.php");
            } else {
                echo "<p style='color: red; font-size: 16px;'>Alguns campos estão faltando!</p>";
            }
        }

        ?>

    </form>

</body>

</html>