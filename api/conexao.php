<?php

$hostname = "localhost";
$bancodedados = "bluesky";
$usuario = "root";
$password = "";

$mysqli = mysqli_connect($hostname,$usuario,$password,$bancodedados) or die(mysqli_error($mysqli));


?>