<?php
include_once("session_login.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<title>Blue Sky| ADM</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="richtext/richtext.min.css" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel="shortcut icon" href="../assets/img/logo_BS.png" type="image/x-icon">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>
<script src="richtext/jquery.richtext.js"></script>
<link rel="stylesheet" href="form.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

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
    <!-- Nav tabs -->
    <nav class="navbar  navbar-expand-sm">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link" href="./formulario.php">CAD. RELATÓRIO VOO</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./cad_abastecimento.php">CAD. ABASTECIMENTOS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./cad_.balanco.php"> CAD. BALANÇO</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="./observacao.php"> CAD. OBSERVAÇÃO</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="./index.php">SAIR</a>
        </li>

      </ul>
    </nav>


    <section class="imagem tab-content">
      <div id="imagem-princ" class="container tab-pane active">
        <form class="form_wrapper" enctype="multipart/form-data" action="cad_solicitacoes.php" method="post">
          <div class="form_container">
            <div class="title_container">
              <h2>Cadastro das Observações</h2>
            </div>

            <div class="w3-row w3-border insert_bx">

              <div class="w3-container w3-100 select-cor" style="margin: 0 0 20px 0;">
                <select  name="solicitante" id="solicitante">
                  <option value="balanco">Observações Balanço</option>
                  <option value="rel-voo">Observações Relatório de voo</option>
                </select>
              </div>


              <div class="w3-container w3-100">

                <div class="input_field "> <span class="box_text"><i class='bx bx-notepad'></i></span>
                  <textarea  name="editor" id="editor"></textarea>
                </div>
              </div>



              <div class="w3-container w3-half select_bx">
                <input class="button" id="action_cad_campus_lab" type="submit" name="cadastrar-btn" value="ENVIAR" />
              </div>
            </div>



            <?php
            if (isset($_POST["cadastrar-btn"])) {
              if (
                !empty($_POST["data_financ"])
                and !empty($_POST["descricao"])
                and !empty($_POST["valor_financ"])
                and !empty($_POST["tipo_gasto"])
              ) {
                $data_financ = $_POST['data_financ'];
                $descricao = mb_strtoupper($_POST['descricao']);
                $tipo_gasto = $_POST['tipo_gasto'];
                if ($tipo_gasto != "RECEITA") {
                  $valor = -1 * $_POST['valor_financ'];
                } else {
                  $valor = $_POST['valor_financ'];
                }

                $inserir = "INSERT INTO financeiro(data_financeiro, descricao, tipo, valor) VALUES ('$data_financ', '$descricao', '$tipo_gasto', $valor)";
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


    <!--------------------------------------------------->


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


      function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
          td_id = tr[i].getElementsByTagName("td")[0];
          td_nome = tr[i].getElementsByTagName("td")[1];
          td_tipo = tr[i].getElementsByTagName("td")[2];
          if (td_id || td_nome) {
            txtValue_id = td_id.textContent || td_id.innerText;
            txtValue_nome = td_nome.textContent || td_nome.innerText;
            if (txtValue_id.toUpperCase().indexOf(filter) > -1 || txtValue_nome.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }


    ClassicEditor
        .create(document.querySelector('#editor'), {
            height: 500 // Defina a altura desejada aqui
        })
        .catch(error => {
            console.error(error);
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.w3schools.com/lib/w3codecolor.js"></script>

</body>

</html>