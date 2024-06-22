<?php
include_once("conexao.php");
session_start();

if ($_SESSION['mes'] == null) {
    $mes = 'todos';
} else {
    $mes = $_SESSION['mes'];
}

if ($_SESSION['ano'] == null) {
    $ano = 'todos';
} else {
    $ano = $_SESSION['ano'];
}

if ($_SESSION['mes_anterior'] == null) {
    $mes_anterior = 'todos';
} else {
    $mes_anterior = $_SESSION['mes_anterior'];
}


if ($mes != "todos" and $ano != "todos") {
    $consulta_financ = "SELECT SUM(valor) AS soma_valor FROM financeiro WHERE MONTH(data_financeiro) = $mes_anterior AND YEAR(data_financeiro) = $ano";

} else if ($mes == "todos" and $ano != "todos") {
    $consulta_financ = "SELECT SUM(valor) AS soma_valor FROM financeiro WHERE YEAR(data_financeiro) = $ano";

} else if ($mes != "todos" and $ano == "todos") {
    $consulta_financ = "SELECT SUM(valor) AS soma_valor FROM financeiro WHERE MONTH(data_financeiro) = $mes_anterior";

} else {
    $consulta_financ = "SELECT SUM(valor) AS soma_valor FROM financeiro";
}
$query_balanco = mysqli_query($mysqli, $consulta_financ) or die(mysqli_error($mysqli));

if (mysqli_num_rows($query_balanco) == 1) {
    while ($linha = mysqli_fetch_array($query_balanco)) {
        $balanco_anterior = $linha["soma_valor"];
    }
}

?>