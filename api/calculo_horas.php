<?php
include_once("conexao.php");
session_start();

$mes = $_SESSION['mes'];
$ano = $_SESSION['ano'];
$mes_anterior = $_SESSION['mes_anterior'];

// TOTAL HORAS ATUAIS
if ($mes != "todos" AND $ano != "todos") {
    $total_horas = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" AND $ano != "todos") {
    $total_horas = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE YEAR(data_voo) = $ano;";
} else if ($mes != "todos" AND $ano == "todos") {
    $total_horas = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE MONTH(data_voo) = $mes;";
} else {
    $total_horas = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas;";
}
$query_total = mysqli_query($mysqli, $total_horas) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_total) == 1) {
    while ($linha = mysqli_fetch_array($query_total)) {
        $total_horas_atuais = $linha['total_horas'];
    }
}


// TOTAL HORAS ANTERIORES
if ($mes != "todos" AND $ano != "todos") {
    $consulta_horas_anterior = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_anterior FROM horas_voadas WHERE MONTH(data_voo) = $mes_anterior and YEAR(data_voo) = ($ano - 1);";
} else if ($mes == "todos" AND $ano != "todos") {
    $consulta_horas_anterior = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_anterior FROM horas_voadas WHERE YEAR(data_voo) = ($ano - 1);";
} else if ($mes != "todos" AND $ano == "todos") {
    $consulta_horas_anterior = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_anterior FROM horas_voadas WHERE MONTH(data_voo) = $mes_anterior;";
} else {
    $consulta_horas_anterior = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_anterior FROM horas_voadas;";
}
$query_anterior = mysqli_query($mysqli, $consulta_horas_anterior) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_anterior) == 1) {
    while ($linha = mysqli_fetch_array($query_anterior)) {
        $total_horas_anterior = $linha['consulta_horas_anterior'];
    }
}



// CALCULO HORAS RESTANTES
if ($mes != "todos" AND $ano != "todos") {
    $consulta_horas_restantes = "SELECT time_format( SEC_TO_TIME(180000 - SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_restantes FROM horas_voadas WHERE MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" AND $ano != "todos") {
    $consulta_horas_restantes = "SELECT time_format( SEC_TO_TIME(180000 - SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_restantes FROM horas_voadas WHERE YEAR(data_voo) = $ano;";
} else if ($mes != "todos" AND $ano == "todos") {
    $consulta_horas_restantes = "SELECT time_format( SEC_TO_TIME(180000 - SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_restantes FROM horas_voadas WHERE MONTH(data_voo) = $mes;";
} else {
    $consulta_horas_restantes = "SELECT time_format( SEC_TO_TIME(180000 -SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS consulta_horas_restantes FROM horas_voadas;";
}
$query_restante = mysqli_query($mysqli, $consulta_horas_restantes) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_restante) == 1) {
    while ($linha = mysqli_fetch_array($query_restante)) {
        $horas_restantes = $linha['consulta_horas_restantes'];
    }
}



// CONTADOR DE RESET DAS 50 HORAS
$partes = explode(":", $total_horas_atuais);
$segundos_utilizados = $partes[0] * 3600 + $partes[1] * 60 + $partes[2];
$contador = 0;
for ($contador = 0; $segundos_utilizados >= 180000; $contador++) {
    $segundos_utilizados -= 180000;
}

$partes_restantes = explode(":", $horas_restantes);
$segundos_restantes = $partes_restantes[0] * 3600 + $partes_restantes[1] * 60 + $partes_restantes[2];
?>