<?php
include_once ("session_login.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<title>Blue Sky| ADM</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="shortcut icon" href="../assets/img/logo_BS.png" type="image/x-icon">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
  integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
<script src="richtext/jquery.richtext.js"></script>
<link rel="stylesheet" href="form.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
  label>span {
    font-weight: 600;
  }
</style>
</head>

<body>

  <div class="container-fluid mx-0 px-1 ">
    <div class="top col-12">

      <div class="logo">
        <img src="../assets/img/logo_BS.png" style="width:40%; " alt="Logo Blue Sky">
      </div>

    </div>

    <!-- Nav tabs -->
    <nav class="navbar  navbar-expand-sm">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="./formulario.php">RELATÓRIO VOO</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./cad_editais.php">ABASTECIMENTOS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./cad_solicitacoes.php"> BALANÇO</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./index.php">SAIR</a>
        </li>

      </ul>
    </nav>

    <section class="imagem tab-content">
      <div id="imagem-princ" class="container tab-pane active">
        <form class="form_wrapper" enctype="multipart/form-data" action="formulario.php" method="post">
          <div class="form_container">
            <div class="title_container">
              <h2>Cadastro de Voo</h2>
            </div>

            <div class="w3-row w3-border insert_bx">

              <div class="w3-container w3-third select_bx">
                <label for="data-voo">Data:</label>
                <div class="input_field"> <span class="box1"><i class='bx bx-notepad'></i></span>
                  <input type="date" name="data_voo" id="data_voo" />
                </div>
              </div>

              <div class="w3-container w3-third select_bx select-cor">
                <select name="mes_voo" id="mes_voo">
                  <option value="mes">Mês</option>
                  <option value="JANEIRO">Janeiro</option>
                  <option value="FEVEREIRO">Fevereiro</option>
                  <option value="MARÇO">Março</option>
                  <option value="ABRIL">Abril</option>
                  <option value="MAIO">Maio</option>
                  <option value="JUNHO">Junho</option>
                  <option value="JULHO">Julho</option>
                  <option value="AGOSTO">Agosto</option>
                  <option value="SETEMBRO">Setembro</option>
                  <option value="OUTUBRO">Outubro</option>
                  <option value="NOVEMBRO">Novembro</option>
                  <option value="DEZEMBRO">Dezembro</option>
                </select>
              </div>

              <div class="w3-container w3-third select_bx">
                <label for="tempo-voo">Tempo de voo</label>
                <div class="input_field"><span class="box1"><i class='bx bxs-plane-alt'></i></span>
                  <input type="time" name="tempo_voo" id="tempo_voo" />
                </div>
              </div>
            </div>

            <div class="w3-row w3-border insert_bx">

              <div class="w3-container w3-third select_bx">
                <label for="partida">Partida:</label>
                <div class="input_field"> <span class="box1"><i class='bx bxs-plane-take-off'></i></span>
                  <input type="text" name="partida" id="partida" />
                </div>
              </div>

              <div class="w3-container w3-third select_bx">
                <label for="destino">Destino:</label>
                <div class="input_field"> <span class="box1"><i class='bx bxs-plane-land'></i></span>
                  <input type="text" name="destino" id="destino" />
                </div>
              </div>

              <div class="w3-container w3-third select_bx select-cor">
                <select name="solicitante" id="solicitante">
                  <option value="sol">Solicitante</option>
                  <option value="Pedro">Pedro</option>
                  <option value="Ivan">Ivan</option>
                  <option value="Charles">Charles</option>
                  <option value="Pedro, Ivan">Pedro, Ivan</option>
                  <option value="Pedro, Charles">Pedro, Charles</option>
                  <option value="Ivan, Charles">Ivan, Charles</option>
                  <option value="Pedro, Charles, Ivan">Pedro, Ivan, Charles</option>
                  <option value="Blue Sky">Blue Sky</option>
                </select>
              </div>

            </div>

            <div class="w3-row w3-border insert_bx">

              <div class="w3-container w3-third select_bx button-rel">
                <input class="button" id="cad-voo" type="submit" name="cadastrar-btn" value="ENVIAR" />
              </div>

            </div>
            <?php
            if (isset($_POST["cadastrar-btn"])) {
              if (
                !empty($_POST["data_voo"])
                AND !empty($_POST["mes_voo"])
                AND !empty($_POST["tempo_voo"])
                AND !empty($_POST["partida"])
                AND !empty($_POST["destino"])
                AND !empty($_POST["solicitante"])
              ) {
                $data_voo = $_POST['data_voo'];
                $mes_voo = $_POST['mes_voo'];
                $tempo_voo = $_POST['tempo_voo'] . ":00";
                $partida = mb_strtoupper($_POST['partida']);
                $destino = mb_strtoupper($_POST['destino']);
                $solicitante = $_POST['solicitante'];

                $inserir = "INSERT INTO horas_voadas(data_voo, mes, partida, destino, solicitante, tempo_voo) VALUES ('$data_voo', '$mes_voo', '$partida', '$destino', '$solicitante', '$tempo_voo')";
                $query = mysqli_query($mysqli, $inserir) or die(mysqli_error($mysqli));

                echo "<p style='color: green; font-size: 16px;'>Cadastro efetuado com sucesso!</p>";
              } else {
                echo "<p style='color: red; font-size: 16px;'>Alguns campos estão faltando!</p>";
              }
            }
            ?>
          </div>
      </div>

    </section>

    <script>
      // Get the Sidebar
      var mySidebar = document.getElementById("mySidebar");

      // Get the DIV with overlay effect
      var overlayBg = document.getElementById("myOverlay");

      // Toggle between showing and hiding the sidebar, and add overlay effect
      function w3_open() {
        if (mySidebar.style.display === 'block') {
          mySidebar.style.display = 'none';
          overlayBg.style.display = "none";
        } else {
          mySidebar.style.display = 'block';
          overlayBg.style.display = "block";
        }
      }

      // Close the sidebar with the close button
      function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.w3schools.com/lib/w3codecolor.js"></script>

</body>

</html>