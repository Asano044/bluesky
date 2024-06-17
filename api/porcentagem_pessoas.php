<?php
include_once ("conexao.php");

$mes = $_SESSION['mes'];
$ano = $_SESSION['ano'];


// Pegando a parte do ivan,charles,pedro para dividir por 3
if ($mes != "todos" and $ano != "todos") {
    $consultaICP = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan, Charles, Pedro' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consultaICP = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan, Charles, Pedro' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consultaICP = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan, Charles, Pedro' AND MONTH(data_voo) = $mes;";
} else {
    $consultaICP = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan, Charles, Pedro'";
}

$queryICP = mysqli_query($mysqli, $consultaICP) or die(mysqli_error($mysqli));
if (mysqli_num_rows($queryICP)) {
    while ($linha = mysqli_fetch_array($queryICP)) {
        $ivan_charles_pedro = $linha["total_horas"];
    }
}
if ($ivan_charles_pedro == null) {
    $segundos_dividir3 = 0;
} else {
    $partes3 = explode(":", $ivan_charles_pedro);
    $segundos_dividir3 = ($partes3[0] * 3600 + $partes3[1] * 60 + $partes3[2]) / 3;
}


// Pegando a parte do Ivan
if ($mes != "todos" and $ano != "todos") {
    $consulta2_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Ivan' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consulta2_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Ivan' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consulta2_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Ivan' AND MONTH(data_voo) = $mes;";
} else {
    $consulta2_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Ivan'";
}
$query2_ivan = mysqli_query($mysqli, $consulta2_ivan) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query2_ivan)) {
    while ($linha = mysqli_fetch_array($query2_ivan)) {
        $ivan2 = $linha["total_horas"];
    }
}
if ($ivan2 == null) {
    $segundos_dividir2_ivan = 0;
} else {
    $partes2_ivan = explode(":", $ivan2);
    $segundos_dividir2_ivan = ($partes2_ivan[0] * 3600 + $partes2_ivan[1] * 60 + $partes2_ivan[2]) / 2;
}


// Pegando a parte do Pedro
if ($mes != "todos" and $ano != "todos") {
    $consulta2_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like 'Pedro, %' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consulta2_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like 'Pedro, %' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consulta2_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like 'Pedro, %' AND MONTH(data_voo) = $mes;";
} else {
    $consulta2_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like 'Pedro, %'";
}
$query2_pedro = mysqli_query($mysqli, $consulta2_pedro) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query2_pedro)) {
    while ($linha = mysqli_fetch_array($query2_pedro)) {
        $pedro2 = $linha["total_horas"];
    }
}
if ($pedro2 == null) {
    $segundos_dividir2_pedro = 0;
} else {
    $partes2_pedro = explode(":", $pedro2);
    $segundos_dividir2_pedro = ($partes2_pedro[0] * 3600 + $partes2_pedro[1] * 60 + $partes2_pedro[2]) / 2;
}



// Pegando a parte do charles
if ($mes != "todos" and $ano != "todos") {
    $consulta2_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Charles' OR solicitante like 'Charles, %' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consulta2_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Charles' OR solicitante like 'Charles, %' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consulta2_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Charles' OR solicitante like 'Charles, %' AND MONTH(data_voo) = $mes;";
} else {
    $consulta2_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante like '%, Charles' OR solicitante like 'Charles, %'";
}
$query2_charles = mysqli_query($mysqli, $consulta2_charles) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query2_charles)) {
    while ($linha = mysqli_fetch_array($query2_charles)) {
        $charles2 = $linha["total_horas"];
    }
}
if ($charles2 == null) {
    $segundos_dividir2_charles = 0;
} else {
    $partes2_charles = explode(":", $charles2);
    $segundos_dividir2_charles = ($partes2_charles[0] * 3600 + $partes2_charles[1] * 60 + $partes2_charles[2]) / 2;
}



// Pegando a hora do Pedro
if ($mes != "todos" and $ano != "todos") {
    $consulta_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Pedro' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consulta_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Pedro' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consulta_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Pedro' AND MONTH(data_voo) = $mes;";
} else {
    $consulta_pedro = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Pedro'";
}

$query_pedro = mysqli_query($mysqli, $consulta_pedro) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_pedro)) {
    while ($linha = mysqli_fetch_array($query_pedro)) {
        $pedro = $linha["total_horas"];
    }
}
if ($pedro == null) {
    $segundos_pedro = 0;
} else {
    $partes_pedro = explode(":", $pedro);
    $segundos_pedro = ($partes_pedro[0] * 3600 + $partes_pedro[1] * 60 + $partes_pedro[2]) + $segundos_dividir2_pedro + $segundos_dividir3;
}


// Pegando a hora do Ivan
if ($mes != "todos" and $ano != "todos") {
    $consulta_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consulta_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consulta_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan' AND MONTH(data_voo) = $mes;";
} else {
    $consulta_ivan = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Ivan'";
}

$query_ivan = mysqli_query($mysqli, $consulta_ivan) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_ivan)) {
    while ($linha = mysqli_fetch_array($query_ivan)) {
        $ivan = $linha["total_horas"];
    }
}
if ($ivan == null) {
    $segundos_ivan = 0;
} else {
    $partes_ivan = explode(":", $ivan);
    $segundos_ivan = ($partes_ivan[0] * 3600 + $partes_ivan[1] * 60 + $partes_ivan[2]) + $segundos_dividir2_ivan + $segundos_dividir3;
}


// Pegando a hora do charles
if ($mes != "todos" and $ano != "todos") {
    $consulta_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Charles' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consulta_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Charles' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consulta_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Charles' AND MONTH(data_voo) = $mes;";
} else {
    $consulta_charles = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Charles'";
}

$query_charles = mysqli_query($mysqli, $consulta_charles) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_charles)) {
    while ($linha = mysqli_fetch_array($query_charles)) {
        $charles = $linha["total_horas"];
    }
}
if ($charles == null) {
    $segundos_charles = 0;
} else {
    $partes_charles = explode(":", $charles);
    $segundos_charles = ($partes_charles[0] * 3600 + $partes_charles[1] * 60 + $partes_charles[2]) + $segundos_dividir2_charles + $segundos_dividir3;
}



// Pegando a hora da blue sky
if ($mes != "todos" and $ano != "todos") {
    $consulta_bluesky = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Blue Sky' AND  MONTH(data_voo) = $mes and YEAR(data_voo) = $ano;";
} else if ($mes == "todos" and $ano != "todos") {
    $consulta_bluesky = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Blue Sky' AND  YEAR(data_voo) = $ano;";
} else if ($mes != "todos" and $ano == "todos") {
    $consulta_bluesky = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Blue Sky' AND MONTH(data_voo) = $mes;";
} else {
    $consulta_bluesky = "SELECT time_format( SEC_TO_TIME( SUM( TIME_TO_SEC( tempo_voo ) ) ),'%H:%i:%s') AS total_horas FROM horas_voadas WHERE solicitante = 'Blue Sky'";
}

$query_bluesky = mysqli_query($mysqli, $consulta_bluesky) or die(mysqli_error($mysqli));
if (mysqli_num_rows($query_bluesky)) {
    while ($linha = mysqli_fetch_array($query_bluesky)) {
        $bluesky = $linha["total_horas"];
    }
}
if ($bluesky == null) {
    $segundos_bluesky = 0;
} else {
    $partes_bluesky = explode(":", $bluesky);
    $segundos_bluesky = ($partes_bluesky[0] * 3600 + $partes_bluesky[1] * 60 + $partes_bluesky[2]);
}
?>