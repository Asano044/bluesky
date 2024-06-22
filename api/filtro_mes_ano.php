<?php
include_once("conexao.php");
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Mês e Ano | Blue Sky</title>
</head>
<body>
    <form action="filtro_mes_ano.php" method="post">
        <h3>Informe o mês que deseja ver:</h3>
        <select name="mes" id="mes">
            <option value="todos">todos</option>
            <?php
                $consulta_mes = "SELECT DISTINCTROW(MONTH(data_voo)) as mes_voo from horas_voadas";
                $query_mes = mysqli_query($mysqli, $consulta_mes) or die(mysqli_error($mysqli));

                while ($linha = mysqli_fetch_array($query_mes)) {
                    ?>
                    <option value="<?php echo $linha['mes_voo']?>"><?php echo $linha['mes_voo']?></option>
                    <?php
                }
            ?>
        </select>

        <h3>Informe o ano que deseja ver:</h3>
        <select name="ano" id="ano">
            <option value="todos">todos</option>
            <?php
                $consulta_ano = "SELECT DISTINCTROW(YEAR(data_voo)) as ano_voo from horas_voadas";
                $query_ano = mysqli_query($mysqli, $consulta_ano) or die(mysqli_error($mysqli));

                while ($linha = mysqli_fetch_array($query_ano)) {
                    ?>
                    <option value="<?php echo $linha['ano_voo']?>"><?php echo $linha['ano_voo']?></option>
                    <?php
                }
            ?>
        </select>
        
        <br><br>
        <input type="submit" value="Ir à página principal" name="btn-enviar">
        <input type="submit" value="Ir à página financeira" name="btn-enviar2">
    </form>
    
    <?php
        if (isset($_POST['btn-enviar'])) {
            $_SESSION['mes'] = $_POST['mes'];
            $_SESSION['ano'] = $_POST['ano'];

            if ($_SESSION['mes'] != "todos") {
                if ($_SESSION['mes'] - 1 == 0) {
                    $_SESSION['mes_anterior'] = 12;
                } else {
                    $_SESSION['mes_anterior'] = $_SESSION['mes'] - 1;
                }
            } else {
                $_SESSION['mes_anterior'] = "todos";
            }

            header("Location: index.php");
        }

        if (isset($_POST['btn-enviar2'])) {
            $_SESSION['mes'] = $_POST['mes'];
            $_SESSION['ano'] = $_POST['ano'];

            if ($_SESSION['mes'] != "todos") {
                if ($_SESSION['mes'] - 1 == 0) {
                    $_SESSION['mes_anterior'] = 12;
                } else {
                    $_SESSION['mes_anterior'] = $_SESSION['mes'] - 1;
                }
            } else {
                $_SESSION['mes_anterior'] = "todos";
            }

            header("Location: balanco.php");
        }
    ?>
</body>
</html>