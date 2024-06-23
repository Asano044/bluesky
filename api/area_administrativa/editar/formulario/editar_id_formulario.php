<?php
include_once ("../../../conexao.php");

if (!empty($_GET["id"])) {
    $id = $_GET['id'];

    $consulta_id = "SELECT * FROM horas_voadas WHERE id = $id";
    $query_id = mysqli_query($mysqli, $consulta_id) or die(mysqli_error($mysqli));
    
    if (mysqli_num_rows($query_id) > 0) {
        while ($linha = mysqli_fetch_array($query_id)) {
            $id = $linha["id"];
            $data_voo = $linha["data_voo"];
            $mes = $linha["mes"];
            $partida = $linha["partida"];
            $destino = $linha["destino"];
            $solicitante = $linha["solicitante"];
            $tempo_voo = $linha["tempo_voo"];
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

    <form method="post" action="editar_id_formulario.php">
        <input type="date" value="<?php echo $data_voo ?>" name="data_voo" id="data_voo" value="">
        <select name="mes_voo" id="mes_voo">
            <option value="mes">Mês</option>
            <option value="JANEIRO">Janeiro</option>
            <option value="FEVEREIRO">Fevereiro</option>
            <option value="MARÇO">Março</option>
            <option value="ABRIL">Abril</option>
            <option value="MAIO">Maio</option>
            <option value="JUNHO">Junho</option>
            <option value="JULHO">Julho</option>
            <option value="AGOSTO">Agosto</option>
            <option value="SETEMBRO">Setembro</option>
            <option value="OUTUBRO">Outubro</option>
            <option value="NOVEMBRO">Novembro</option>
            <option value="DEZEMBRO">Dezembro</option>
        </select>
        <input type="text" value="<?php echo $partida ?>" name="partida">
        <input type="text" value="<?php echo $destino ?>" name="destino">
        <select name="solicitante" id="solicitante">
            <option value="sol">Solicitante</option>
            <option value="Pedro">Pedro</option>
            <option value="Ivan">Ivan</option>
            <option value="Charles">Charles</option>
            <option value="Pedro, Ivan">Pedro, Ivan</option>
            <option value="Pedro, Charles">Pedro, Charles</option>
            <option value="Ivan, Charles">Ivan, Charles</option>
            <option value="Ivan, Charles, Pedro">Ivan, Charles, Pedro</option>
            <option value="Blue Sky">Blue Sky</option>
        </select>
        <input type="time" value="<?php echo $tempo_voo ?>" name="tempo_voo">
        <input type="hidden" name="id" value="<?php echo $id ?>">

        <input type="submit" value="Enviar" name="editar_btn">

        <?php
        if (isset($_POST["editar_btn"])) {
            if (
                !empty($_POST["data_voo"])
                and !empty($_POST["mes_voo"])
                and !empty($_POST["tempo_voo"])
                and !empty($_POST["partida"])
                and !empty($_POST["destino"])
                and !empty($_POST["solicitante"])
            ) {
                $id = $_POST['id'];
                $data_voo = $_POST['data_voo'];
                $mes_voo = $_POST['mes_voo'];
                $tempo_voo = $_POST['tempo_voo'] . ':00';
                $partida = mb_strtoupper($_POST['partida']);
                $destino = mb_strtoupper($_POST['destino']);
                $solicitante = $_POST['solicitante'];

                $inserir = "UPDATE horas_voadas SET data_voo='$data_voo', mes='$mes_voo', partida='$partida', destino='$destino', solicitante='$solicitante', tempo_voo='$tempo_voo' WHERE id = $id";
                $query = mysqli_query($mysqli, $inserir) or die(mysqli_error($mysqli));

                header("Location: editar_formulario.php");
            } else {
                echo "<p style='color: red; font-size: 16px;'>Alguns campos estão faltando!</p>";
            }
        }

        ?>

    </form>

</body>

</html>