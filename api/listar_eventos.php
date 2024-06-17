<?php 
    include_once "conexao.php";

    $consulta = "SELECT id, data_voo, solicitante FROM horas_voadas";
    $query = mysqli_query($mysqli, $consulta) or die(mysqli_error($mysqli));

    $eventos = [];

    if ($query->num_rows > 0) {
        while($linha = mysqli_fetch_array($query)) {
            $id = $linha['id'];
            $data_voo = $linha['data_voo'];
            $solicitante = $linha['solicitante'];

            $eventos[] = [
                'id' => $id,
                'title' => $solicitante,
                'color' => '#325597',
                'start' => $data_voo,
                'end' => $data_voo
            ];
        }
    }

    echo json_encode($eventos)
?>