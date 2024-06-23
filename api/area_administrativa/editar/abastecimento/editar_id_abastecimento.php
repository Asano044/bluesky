<?php
include_once ("../../../conexao.php");

if (!empty($_GET["id"])) {
    $id = $_GET['id'];

    $consulta_id = "SELECT * FROM abastecimentos WHERE id = $id";
    $query_id = mysqli_query($mysqli, $consulta_id) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($query_id) > 0) {
        while ($linha = mysqli_fetch_array($query_id)) {
            $id = $linha["id"];
            $data_abast = $linha["data_abastecimento"];
            $local = $linha["local"];
            $solicitante = $linha["solicitante"];
            $nf = $linha["nf"];
            $data_venc = $linha['data_vencimento'];
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

    <form method="post" action="editar_id_abastecimento.php">
        <input type="date" value="<?php echo $data_abast ?>" name="data_abast" id="data_abast" value="">
        <input type="text" value="<?php echo $local ?>" name="local">
        <select name="solicitante" id="solicitante">
            <option value="sol">Solicitante</option>
            <option value="Pedro">Pedro</option>
            <option value="Ivan">Ivan</option>
            <option value="Charles">Charles</option>
            <option value="Blue Sky">Blue Sky</option>
        </select>
        <input type="text" value="<?php echo $nf ?>" name="nf">
        <input type="date" value="<?php echo $data_venc ?>" name="data_venc">
        <input type="number" value="<?php echo $valor?>" name="valor" id="valor">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <input type="submit" value="Enviar" name="editar_btn">

        <?php
        if (isset($_POST["editar_btn"])) {
            if (
                !empty($_POST["data_abast"])
                and !empty($_POST["local"])
                and !empty($_POST["solicitante"])
                and !empty($_POST["nf"])
                and !empty($_POST["data_venc"])
                and !empty($_POST["valor"])
            ) {
                $id = $_POST['id'];
                $data_abast = $_POST['data_abast'];
                $local = mb_strtoupper($_POST['local']);
                $solicitante = $_POST['solicitante'];
                $nf = $_POST['nf'];
                $data_venc = $_POST['data_venc'];
                $valor = $_POST['valor'];

                $inserir = "UPDATE abastecimentos SET data_abastecimento='$data_abast', local='$local', solicitante='$solicitante', nf='$nf', data_vencimento='$data_venc', valor=$valor WHERE id = $id";
                $query = mysqli_query($mysqli, $inserir) or die(mysqli_error($mysqli));

                header("Location: editar_abastecimento.php");
            } else {
                echo "<p style='color: red; font-size: 16px;'>Alguns campos estão faltando!</p>";
            }
        }

        ?>

    </form>

</body>

</html>