<?php
include_once("../../../conexao.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $deletar = "DELETE FROM observacao WHERE id = $id";
    $query_deletar = mysqli_query($mysqli, $deletar) or die(mysqli_error($mysqli));

    header("Location: ../../observacao.php");
}

?>