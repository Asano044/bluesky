<?php 
    include_once "conexao.php";

    $consulta_financ = "SELECT id, data_financeiro, descricao, tipo FROM financeiro";
    $query_financ = mysqli_query($mysqli, $consulta_financ) or die(mysqli_error($mysqli));

    $eventos = [];

    if ($query_financ->num_rows > 0) {
        while($linha = mysqli_fetch_array($query_financ)) {
            $id = $linha['id'];
            $descricao = $linha['descricao'];
            $data_financ = $linha['data_financeiro'];
            if ($linha['tipo'] != "RECEITA") {
                $cor = "#973532";
            } else {
                $cor = "#325597";
            }

            $eventos[] = [
                'id' => $id,
                'title' => $descricao,
                'color' => $cor,
                'start' => $data_financ,
                'end' => $data_financ
            ];
        }
    }

    echo json_encode($eventos)
?>