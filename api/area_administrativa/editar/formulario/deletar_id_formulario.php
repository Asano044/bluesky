<?php
include_once("../../../conexao.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $deletar = "DELETE FROM horas_voadas WHERE id = $id";
    $query_deletar = mysqli_query($mysqli, $deletar) or die(mysqli_error($mysqli));

    header("Location: ../../formulario.php");
}

?>