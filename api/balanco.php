<?php
include_once ("calculo_balanco.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blue Sky - Balanço</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.css">
  <link rel="shortcut icon" href="../assets/img/logo_BS.png" type="image/x-icon">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        dayMaxEventRows: true,
        events: 'listar_evento_financeiro.php',
        listDayFormat: true,
        listDaySideFormat: true,
        navLinks: true,
        moreLinkClick: 'popover',
        expandRows: true,
        selectable: true,
        selectHelper: true,
        locale: 'pt',
        themeSystem: 'bootstrap',
        height: 'auto',
        contentHeight: 'auto',
        stickyHeaderDates: 'auto',
        dayPopoverFormat: {
          month: 'long',
          day: 'numeric',
          year: 'numeric'
        },
        initialView: 'dayGridMonth',
        titleFormat: {
          year: 'numeric',
          month: 'long',
          day: 'numeric'
        },
        buttonText: {
          today: 'Hoje',
          month: 'Mês',
          list: 'Lista'
        },
        buttonIcons: {
          prev: 'fa-chevron-left',
          next: 'fa-chevron-right',
          prevYear: 'fas fa-angle-double-left',
          nextYear: 'fas fa-angle-double-right'
        },
        headerToolbar: {
          left: 'prev,today,next',
          center: 'title',
          right: 'dayGridMonth,list'
        }
      });
      calendar.render();
      calendar.setOption('locale', 'pt');
    });
  </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo_BS.png" alt="logo Blue Sky">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Administrativo</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="./area_administrativa/index.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Área administrativa</span>
              </a>
              <a class="dropdown-item d-flex align-items-center" href="filtro_mes_ano.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Filtro Mês e Ano</span>
              </a>
            </li>
        </li>
      </ul><!-- Senha Adm -->
      </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i> <span>PA34 SENECA III - PR EMN</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php" target="_self">
              <i class="bi bi-circle"></i><span>Relatório de Voo</span>
            </a>
          </li>
          <li>
            <a href="./balanco.php" target="_self">
              <i class="bi bi-circle"></i><span>Balanço Mensal</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-airplane"></i><span>Voo 2 </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>1</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
    </ul>
  </aside><!-- End Sidebar-->


  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Balanço Mensal</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Pág. Anterior</a></li>

        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="filter_balanco">
            <div class="mes">
              <h3>Selecione o mês</h3>
              <form>
                <select class="form-select form-select-sm mt-3">
                  <option>Todos</option>
                  <option>Janeiro</option>
                  <option>Fevereiro</option>
                  <option>Março</option>
                  <option>Abril</option>
                  <option>Maio</option>
                  <option>Junho</option>
                  <option>Julho</option>
                  <option>Agosto</option>
                  <option>Setembro</option>
                  <option>Outubro</option>
                  <option>Novembro</option>
                  <option>Dezembro</option>
                </select>
              </form>
            </div>

            <div class="ano">
              <h3>Selecione o ano</h3>
              <form>
                <select class="form-select form-select-sm mt-3">
                  <option>Todos</option>
                  <option>2023</option>
                  <option>2024</option>
                </select>
              </form>
            </div>

            <div class="tipo">
              <h3>Selecione o Tipo</h3>
              <form>
                <select class="form-select form-select-sm mt-3">
                  <option>Tipo</option>
                  <option>Despesas Fixa</option>
                  <option>Despesas Váriaveis</option>
                  <option>Receitas</option>
                </select>
              </form>
            </div>

            <button type="button" class="btn btn-outline-primary shadow-custom botao_sel">Enviar</button>
          </div>

          <div class="row">
            <!-- Despesas Fixas -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title" style="color: red;">Tabela Financeira<span>| <?php echo "$mes/$ano" ?></span>
                  </h5>
                  <!-- Tabela com linhas listradas -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th><b>D</b>ata</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($mes != "todos" and $ano != "todos") {
                        $consulta_financ = "SELECT data_financeiro, descricao, tipo, valor FROM financeiro WHERE MONTH(data_financeiro) = $mes AND YEAR(data_financeiro) = $ano";
                      } else if ($mes == "todos" and $ano != "todos") {
                        $consulta_financ = "SELECT data_financeiro, descricao, tipo, valor FROM financeiro WHERE YEAR(data_financeiro) = $ano";
                      } else if ($mes != "todos" and $ano == "todos") {
                        $consulta_financ = "SELECT data_financeiro, descricao, tipo, valor FROM financeiro WHERE MONTH(data_financeiro) = $mes";
                      } else {
                        $consulta_financ = "SELECT data_financeiro, descricao, tipo, valor FROM financeiro";
                      }
                      $query_financ = mysqli_query($mysqli, $consulta_financ) or die(mysqli_error($mysqli));
                      $balanco = 0;
                      while ($linha = mysqli_fetch_array($query_financ)) {
                        $balanco += $linha['valor'];
                        ?>
                        <tr>
                          <td><?php echo $linha['data_financeiro'] ?></td>
                          <td><?php echo $linha['descricao'] ?></td>
                          <td><?php echo $linha['tipo'] ?></td>
                          <td><?php echo number_format($linha['valor'], 2, ",", ".") ?></td>
                        </tr>
                        <?php
                      }
                      ?>

                      <td></td>
                      <td colspan="3" style="text-align: right;"><b>TOTAL:
                          <?php echo number_format($balanco, 2, ",", ".") ?></b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- End Despesas Fixas -->


            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title balanco">Balanço do Mês Anterior:</h5>

                    <h3 class="vl_bal">R$ <?php echo number_format($balanco_anterior, 2, ",", ".") ?></h3>

                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title balanco">Balanço desse Mês: </h5>

                    <h3 class="vl_bal">R$ <?php echo number_format($balanco, 2, ",", '.') ?></h3>


                  </div>
                </div>
              </div>
            </div>


          </div>
        </div><!-- End Left side columns -->

        <div class="col-lg-4">
          <div class="container_calender">
            <div id="calendar"></div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title ">Balanço</h5>

              <!-- Grafico -->
              <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: [
                        <?php
                        $mes_financ = "SELECT DISTINCTROW(MONTH(data_financeiro)) AS meses FROM financeiro";
                        $query_meses = mysqli_query($mysqli, $mes_financ) or die(mysqli_error($mysqli));
                        while ($linha = mysqli_fetch_array($query_meses)) {
                          echo $linha['meses'];
                        }
                        ?>
                      ],
                      labels: ['Despesas', 'Receita', 'Mês', 'Total'],
                      datasets: [{
                        label: 'Balanço Total',
                        data: [<?php echo $balanco_anterior ?>, <?php echo $balanco ?>,],
                        backgroundColor: [
                          <?php
                          if ($balanco <= 0) {
                            ?> '#973532',
                            <?php
                          } else {
                            ?> '#325597',
                            <?php
                          }

                          if ($balanco_anterior <= 0) {
                            ?> '#973532',
                            <?php
                          } else {
                            ?> '#325597',
                            <?php
                          }
                          ?>
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End grafico -->
            </div>
          </div>

          <!-- Card Mês Anterior -->
          <div class="col-xxl-12">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Balanço Total</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class='bx bx-money'></i>
                  </div>
                  <div class="ps-3">
                    <h6 id="balance-value"><?php echo number_format($balanco, 2, ",", '.'); ?></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="col-lg-12 observacao">
          <h3>Observações: </h3>
          <?php
          if ($mes != "todos" and $ano != "todos") {
            $consulta_obs = "SELECT comentario FROM observacao WHERE tipo='balanco' AND MONTH(data_obs) = $mes AND YEAR(data_obs) = $ano";

          } else if ($mes == "todos" and $ano != "todos") {
            $consulta_obs = "SELECT comentario FROM observacao WHERE tipo='balanco' AND YEAR(data_obs) = $ano";

          } else if ($mes != "todos" and $ano == "todos") {
            $consulta_obs = "SELECT comentario FROM observacao WHERE tipo='balanco' AND MONTH(data_obs) = $mes";

          } else {
            $consulta_obs = "SELECT comentario FROM observacao WHERE tipo='balanco'";
          }
          $query_obs = mysqli_query($mysqli, $consulta_obs) or die(mysqli_error($mysqli));
          while ($linha = mysqli_fetch_array($query_obs)) {
            echo "<p>$linha[comentario]</p>";

          }
          ?>
          
        </div>

    </section>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>blueSky</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>