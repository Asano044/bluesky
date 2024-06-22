<?php
include_once("conexao.php");
session_start();
$mes = $_SESSION['mes'];
$ano = $_SESSION['ano'];
$mes_anterior = $_SESSION['mes_anterior'];


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