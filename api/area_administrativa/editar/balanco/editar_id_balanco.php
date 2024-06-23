<?php
include_once ("../../../conexao.php");

if (!empty($_GET["id"])) {
    $id = $_GET['id'];

    $consulta_id = "SELECT * FROM financeiro WHERE id = $id";
    $query_id = mysqli_query($mysqli, $consulta_id) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($query_id) > 0) {
        while ($linha = mysqli_fetch_array($query_id)) {
            $id = $linha["id"];
            $data_financ = $linha["data_financeiro"];
            $descricao = $linha["descricao"];
            $tipo = $linha["tipo"];
            $valor = $linha["valor"];
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

    <form method="post" action="editar_id_balanco.php">
        <input type="date" value="<?php echo $data_financ ?>" name="data_financ" id="data_financ" value="">
        <input type="text" value="<?php echo $descricao ?>" name="descricao">
        <select class="tipo_gasto" name="tipo_gasto" id="tipo_gasto">
            <option value="">Tipo de Gasto</option>
            <option value="RECEITA">Receita</option>
            <option value="FIXO">Gasto Fixo</option>
            <option value="VARIAVEL">Gasto Variável</option>
        </select>
        <input type="number" value="<?php echo $valor?>" name="valor" id="valor">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <input type="submit" value="Enviar" name="editar_btn">

        <?php
        if (isset($_POST["editar_btn"])) {
            if (
                !empty($_POST["data_financ"])
                and !empty($_POST["descricao"])
                and !empty($_POST["tipo_gasto"])
                and !empty($_POST["valor"])
            ) {
                $id = $_POST['id'];
                $data_financ = $_POST['data_financ'];
                $descricao = mb_strtoupper($_POST['descricao']);
                $tipo = $_POST['tipo_gasto'];
                if ($tipo != 'RECEITA') {
                    $valor = -1 * $_POST['valor'];
                } else {
                    $valor = $_POST['valor'];
                }

                $inserir = "UPDATE financeiro SET data_financeiro='$data_financ', descricao='$descricao', tipo='$tipo', valor=$valor WHERE id = $id";
                $query = mysqli_query($mysqli, $inserir) or die(mysqli_error($mysqli));

                header("Location: editar_balanco.php");
            } else {
                echo "<p style='color: red; font-size: 16px;'>Alguns campos estão faltando!</p>";
            }
        }

        ?>

    </form>

</body>

</html>