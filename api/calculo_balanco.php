<?php
include_once("conexao.php");
session_start();

$mes = $_SESSION["mes_financ"];
$ano = $_SESSION["ano_financ"];
$mes_anterior = $_SESSION["mes_anterior_financ"];


if ($mes != "todos" and $ano != "todos") {
    $consulta_variavel = "SELECT SUM(valor) AS soma_variavel FROM financeiro WHERE MONTH(data_financeiro) = $mes AND YEAR(data_financeiro) = $ano AND tipo='VARIAVEL'";
  } else if ($mes == "todos" and $ano != "todos") {
    $consulta_variavel = "SELECT SUM(valor) AS soma_variavel FROM financeiro WHERE YEAR(data_financeiro) = $ano AND tipo='VARIAVEL'";

  } else if ($mes != "todos" and $ano == "todos") {
    $consulta_variavel = "SELECT SUM(valor) AS soma_variavel FROM financeiro WHERE MONTH(data_financeiro) = $mes AND tipo='VARIAVEL'";

  } else {
    $consulta_variavel = "SELECT SUM(valor) AS soma_variavel FROM financeiro WHERE tipo='VARIAVEL'";
  }
  $query_variavel = mysqli_query($mysqli,$consulta_variavel) or die(mysqli_error($mysqli));
  if (mysqli_num_rows($query_variavel) == 1) {
    while ($linha = mysqli_fetch_assoc($query_variavel)) {
        $gasto_var = $linha["soma_variavel"];
    }
}


// gasto fixo
if ($mes != "todos" and $ano != "todos") {
    $consulta_fixo = "SELECT SUM(valor) AS soma_fixo FROM financeiro WHERE MONTH(data_financeiro) = $mes AND YEAR(data_financeiro) = $ano AND tipo='FIXO'";
  } else if ($mes == "todos" and $ano != "todos") {
    $consulta_fixo = "SELECT SUM(valor) AS soma_fixo FROM financeiro WHERE YEAR(data_financeiro) = $ano AND tipo='FIXO'";

  } else if ($mes != "todos" and $ano == "todos") {
    $consulta_fixo = "SELECT SUM(valor) AS soma_fixo FROM financeiro WHERE MONTH(data_financeiro) = $mes AND tipo='FIXO'";

  } else {
    $consulta_fixo = "SELECT SUM(valor) AS soma_fixo FROM financeiro WHERE tipo='FIXO'";
  }
  $query_fixo = mysqli_query($mysqli,$consulta_fixo) or die(mysqli_error($mysqli));
  if (mysqli_num_rows($query_fixo) == 1) {
    while ($linha = mysqli_fetch_assoc($query_fixo)) {
        $gasto_fixo = $linha["soma_fixo"];
    }
}

// receita

if ($mes != "todos" and $ano != "todos") {
    $consulta_receita = "SELECT SUM(valor) AS soma_receita FROM financeiro WHERE MONTH(data_financeiro) = $mes AND YEAR(data_financeiro) = $ano AND tipo='RECEITA'";
  } else if ($mes == "todos" and $ano != "todos") {
    $consulta_receita = "SELECT SUM(valor) AS soma_receita FROM financeiro WHERE YEAR(data_financeiro) = $ano AND tipo='RECEITA'";

  } else if ($mes != "todos" and $ano == "todos") {
    $consulta_receita = "SELECT SUM(valor) AS soma_receita FROM financeiro WHERE MONTH(data_financeiro) = $mes AND tipo='RECEITA'";

  } else {
    $consulta_receita = "SELECT SUM(valor) AS soma_receita FROM financeiro WHERE tipo='RECEITA'";
  }
  $query_receita = mysqli_query($mysqli,$consulta_receita) or die(mysqli_error($mysqli));
  if (mysqli_num_rows($query_receita) == 1) {
    while ($linha = mysqli_fetch_assoc($query_receita)) {
        $receita = $linha["soma_receita"];
    }
}

// balanço
if ($mes != "todos" and $ano != "todos") {
  $consulta_balanco = "SELECT SUM(valor) AS soma_balanco FROM financeiro WHERE MONTH(data_financeiro) = $mes AND YEAR(data_financeiro) = $ano";
} else if ($mes == "todos" and $ano != "todos") {
  $consulta_balanco = "SELECT SUM(valor) AS soma_balanco FROM financeiro WHERE YEAR(data_financeiro) = $ano";

} else if ($mes != "todos" and $ano == "todos") {
  $consulta_balanco = "SELECT SUM(valor) AS soma_balanco FROM financeiro WHERE MONTH(data_financeiro) = $mes";

} else {
  $consulta_balanco = "SELECT SUM(valor) AS soma_balanco FROM financeiro";
}
$query_balanco = mysqli_query($mysqli,$consulta_balanco) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_balanco) == 1) {
  while ($linha = mysqli_fetch_assoc($query_balanco)) {
      $balanco_mensal = $linha["soma_balanco"];
  }
}


// balanço mês anterior
if ($mes != "todos" and $ano != "todos") {
  $consulta_balanco_ant = "SELECT SUM(valor) AS soma_balanco_ant FROM financeiro WHERE MONTH(data_financeiro) = $mes_anteior AND YEAR(data_financeiro) = $ano";
} else if ($mes == "todos" and $ano != "todos") {
  $consulta_balanco_ant = "SELECT SUM(valor) AS soma_balanco_ant FROM financeiro WHERE YEAR(data_financeiro) = $ano";

} else if ($mes != "todos" and $ano == "todos") {
  $consulta_balanco_ant = "SELECT SUM(valor) AS soma_balanco_ant FROM financeiro WHERE MONTH(data_financeiro) = $mes_anteior";

} else {
  $consulta_balanco_ant = "SELECT SUM(valor) AS soma_balanco_ant FROM financeiro";
}
$query_balanco_ant = mysqli_query($mysqli,$consulta_balanco_ant) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_balanco_ant) == 1) {
  while ($linha = mysqli_fetch_assoc($query_balanco_ant)) {
      $balanco_mensal_anterior = $linha["soma_balanco_ant"];
  }
}

$balanco_total = $balanco_mensal + $balanco_mensal_anterior;

?>