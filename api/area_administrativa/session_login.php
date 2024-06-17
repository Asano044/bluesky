<?php
include_once("../conexao.php");
session_start();

if ($_SESSION['registro'] == '' AND $_SESSION['password'] == '') {
  header('Location: index.php');
}
?>