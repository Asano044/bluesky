<?php
include_once ("calculo_horas.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Blue Sky - Relatório de Voo</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" href="assets/img/favicon.png">
  <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
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
        events: 'listar_eventos.php',
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
        },
        windowResize: function (arg) { }
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
          <a class="nav-link nav-icon search-bar-toggle" href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Administrativo</span>
          </a><!-- End Profile Image Icon -->
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
                <span>Filtrar Mês e Ano</span>
              </a>
            </li>
          </ul><!-- Senha Adm -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav><!-- End Icons Navigation -->
  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-grid"></i>
          <span>Relatório de Voo</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="./balanco.php">
          <i class="bi bi-envelope"></i>
          <span>Balanço Mensal</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Relatório de Voo</h1>
      <nav>

      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Card Mês Anterior-->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Horas Mês anterior | <br><span><?php echo $mes_anterior ?></span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bxs-chevrons-left'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_horas_anterior ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Card Mês Anterior-->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Horas Mês Atual | <br><span><?php echo $mes ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-alarm'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_horas_atuais ?></h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Card Mês Anterior-->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Total Horas | <br>
                    <span>(50 hrs)</span>
                  </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-bar-chart-square'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $horas_restantes ?></h6>

                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- Card Mês Anterior-->

            <!-- Card Mês Anterior-->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Qtde vezes que resetou | <br>
                    <span>pós 50 horas</span>
                  </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class='bx bx-bar-chart-square'></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $contador ?></h6>

                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- Card Mês Anterior-->


            <!-- Relatorio DEzembro -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Relatório <span>| <?php echo "$mes/$ano" ?></span></h5>


                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th class="dta" scope="col">Data</th>
                        <th scope="col">Mês</th>
                        <th scope="col">Partida </th>
                        <th scope="col">Destino</th>
                        <th scope="col">Solicitante</th>
                        <th scope="col">Tempo de voo</th>
                      </tr>
                    </thead>

                    <tbody>
                      <!-- <tr class="t-voo">
                        <td>10/01/2024</td>
                        <td>JANEIRO</td>
                        <td>SÃO PAULO</td>
                        <td>TAUBATÉ</td>
                        <td><span class="badge bg-primary">Blue Sky</span></td>
                        <td><span class="badge bg-primary">00:30:00</span></td>
                      </tr>
                      <tr class="t-voo">
                        <td>10/01/2024</td>
                        <td>JANEIRO</td>
                        <td>SÃO PAULO</td>
                        <td>TAUBATÉ</td>
                        <td><span class="badge bg-primary">Blue Sky</span></td>
                        <td><span class="badge bg-primary">00:30:00</span></td>
                      </tr> -->
                      <?php

                      if ($mes != "todos" and $ano != "todos") {
                        $consulta_voo = "SELECT data_voo, mes, partida, destino, solicitante, tempo_voo FROM horas_voadas WHERE MONTH(data_voo) = $mes AND YEAR(data_voo) = $ano";

                      } else if ($mes == "todos" and $ano != "todos") {
                        $consulta_voo = "SELECT data_voo, mes, partida, destino, solicitante, tempo_voo FROM horas_voadas WHERE YEAR(data_voo) = $ano";

                      } else if ($mes != "todos" and $ano == "todos") {
                        $consulta_voo = "SELECT data_voo, mes, partida, destino, solicitante, tempo_voo FROM horas_voadas WHERE MONTH(data_voo) = $mes";

                      } else {
                        $consulta_voo = "SELECT data_voo, mes, partida, destino, solicitante, tempo_voo FROM horas_voadas";
                      }
                      $query_voo = mysqli_query($mysqli, $consulta_voo) or die(mysqli_error($mysqli));
                      while ($linha = mysqli_fetch_array($query_voo)) {
                        ?>
                        <tr class="t-voo">
                          <td><?php echo $linha['data_voo'] ?></td>
                          <td><?php echo $linha['mes'] ?></td>
                          <td><?php echo $linha['partida'] ?></td>
                          <td><?php echo $linha['destino'] ?></td>
                          <td><span class="badge bg-primary"><?php echo $linha['solicitante'] ?></span></td>
                          <td><span class="badge bg-primary"><?php echo $linha['tempo_voo'] ?></span></td>
                        </tr>
                        <?php
                      }
                      ?>

                      <!-- Linha com o total de horas -->
                      <tr>
                        <td colspan="5" style="text-align: right; color: #012970; font-size: 13px;"><b>Total horas:</b>
                        </td>
                        <td style="color: #012970; font-size: 13px;"><b><?php echo $total_horas_atuais ?></b></td>
                      </tr>

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Relatorio DEzembro -->

          </div>
        </div><!-- colunas lado dir. -->

        <!-- Coluna do lado direito -->
        <div class="col-lg-4">

          <div class="container_calender">
            <div id='calendar'></div>
          </div>

        </div>

        <!-- Outra coluna do lado direito -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body radial">
              <h5 class="card-title">Gráfico de Barra Radial</h5>

              <!-- Gráfico de Barra Radial -->
              <div id="radialBarChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#radialBarChart"), {
                    series: [44, 55, 67, 83],
                    chart: {
                      height: 240,
                      type: 'radialBar',
                      toolbar: {
                        show: true
                      }
                    },
                    plotOptions: {
                      radialBar: {
                        dataLabels: {
                          name: {
                            fontSize: '22px',
                          },
                          value: {
                            fontSize: '16px',
                          },
                          total: {
                            show: true,
                            label: 'Total',
                            formatter: function (w) {
                              // Por padrão, essa função retorna a média de todas as séries. O exemplo abaixo mostra o uso de um formato personalizado.
                              return 249;
                            }
                          }
                        }
                      }
                    },
                    labels: [],
                  }).render();
                });
              </script>
              <!-- Fim do Gráfico de Barra Radial -->

            </div>
          </div>
        </div>


        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Donut Chart</h5>

              <!-- Donut Chart -->
              <div id="donutChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#donutChart"), {
                    series: [44, 55, 13, 43, 22],
                    chart: {
                      height: 219,
                      type: 'donut',
                      toolbar: {
                        show: true
                      }
                    },
                    labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
                  }).render();
                });
              </script>
              <!-- End Donut Chart -->

            </div>
          </div>
        </div>


        <div class="col-lg-12 title">
          <h2>Descritivo de Abastecimento</h2>
        </div>

        <!-- Table with stripped rows -->
        <table class="table datatable">
          <thead>
            <tr>
              <th>
                <b>D</b>ata
              </th>
              <th>Local</th>
              <th>Solicitante</th>
              <th>NF</th>
              <th>Valor</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>18/12/2023</td>
              <td>Ubatuba</td>
              <td>Pedro</td>
              <td>NF8593</td>
              <td>2594</td>
            </tr> -->

            <?php 
              $consulta_abastecimento = "SELECT data_abastecimento, local, solicitante, nf, data_vencimento, valor FROM abastecimentos";
              $query_abastecimento = mysqli_query($mysqli, $consulta_abastecimento) or die(mysqli_error($mysqli));

              while ($linha = mysqli_fetch_array($query_abastecimento)) {
                ?>
                <tr>
                  <td><?php echo $linha['data_abastecimento'] ?></td>
                  <td><?php echo $linha['local'] ?></td>
                  <td><?php echo $linha['solicitante'] ?></td>
                  <td><?php echo $linha['nf'] ?></td>
                  <td><?php echo number_format($linha['valor'], 2, ",", ".") ?></td>
                </tr>
                <?php
              }
            ?>

            <!-- Linha com o total -->
            <tr>
              <td colspan="4" style="text-align: right; color: #012970;"><b>Total:</b></td>
              <td style="color: #012970;"><b>23346</b></td>
            </tr>

          </tbody>
        </table>


        <div class="col-lg-12 observacao">
          <h3>Observações: </h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, labore? Minima, natus at obcaecati dolore
            deserunt sapiente, perferendis vel vitae amet adipisci labore aliquam necessitatibus laborum consectetur.
            Distinctio, nam eos.</p>
        </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Blue Sky</span></strong>. All Rights Reserved
    </div>
    <div class="credits">

      Designed by <a href="https://www.instagram.com/canbe_digital/">Can Be Digital</a>
    </div>
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