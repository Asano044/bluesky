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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
            </li>
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
          <div class="row">
        

<!-- Despesas Fixas -->
<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title" style="color: red;">Despesas Fixas<span>| Dezembro/2023</span></h5>
      <!-- Tabela com linhas listradas -->
      <table class="table datatable">
        <thead>
          <tr>
            <th><b>D</b>ata</th>
            <th>Descrição</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>18/12/2023</td>
            <td>Hangar</td>
            <td>2500</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Administração Blue Sky</td>
            <td>10000</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Assinatura GNSS (1 ano Garmin)</td>
            <td>4455</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Ubatuba</td>
            <td>Pedro</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Ubatuba</td>
            <td>Pedro</td>
          </tr>
         
            <td></td>
            <td colspan="2" style="text-align: right;"><b>TOTAL: 16955</b></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- End Despesas Fixas -->



<!-- Despesas Variáveis -->
<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title desp" style="color: red;">Despesas Variáveis<span>| Dezembro/2023</span></h5>
      <!-- Tabela com linhas listradas -->
      <table class="table datatable">
        <thead>
          <tr>
            <th><b>D</b>ata</th>
            <th>Descrição</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>18/12/2023</td>
            <td>Hangar</td>
            <td>2500</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Administração Blue Sky</td>
            <td>10000</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Assinatura GNSS (1 ano Garmin)</td>
            <td>4455</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Ubatuba</td>
            <td>Pedro</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Ubatuba</td>
            <td>Pedro</td>
          </tr>

          <tr>
            <td></td>
            <td colspan="2" style="text-align: right;"><b>TOTAL: 16955</b></td>
          </tr>
       
        </tbody>
      </table>
    </div>
  </div>
</div><!-- End Despesas Variáveis -->
  

<!-- Receita -->
<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title receita" style="color: rgb(17, 145, 17);">Receitas<span>| Dezembro/2023</span></h5>
      <!-- Tabela com linhas listradas -->
      <table class="table datatable">
        <thead>
          <tr>
            <th><b>D</b>ata</th>
            <th>Descrição</th>
            <th>Valor</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>18/12/2023</td>
            <td>Hangar</td>
            <td>2500</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Administração Blue Sky</td>
            <td>10000</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Assinatura GNSS (1 ano Garmin)</td>
            <td>4455</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Ubatuba</td>
            <td>Pedro</td>
          </tr>
          <tr>
            <td>18/12/2023</td>
            <td>Ubatuba</td>
            <td>Pedro</td>
          </tr>
          <tr>
            <td></td>
            <td colspan="2" style="text-align: right;"><b>TOTAL: 16955</b></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div><!-- End Receita -->



<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Dez| 2023:</h5>
        <center>
          <h3>R$ 16955</h3>
        </center>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Total Mês: </h5>
        <center>
          <h3>R$ 16955</h3>
        </center>
        
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
      <h5 class="card-title">Bar Chart</h5>

      <!-- Bar Chart -->
      <canvas id="barChart" style="max-height: 400px;"></canvas>
      <script>
        document.addEventListener("DOMContentLoaded", () => {
          new Chart(document.querySelector('#barChart'), {
            type: 'bar',
            data: {
              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
              datasets: [{
                label: 'Bar Chart',
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 205, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(201, 203, 207, 0.2)'
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
      <!-- End Bar Chart -->
    </div>
  </div>

    <!-- Card Mês Anterior -->
    <div class="col-xxl-12">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Balanço do mês</h5>
          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class='bx bx-money' ></i>
            </div>
            <div class="ps-3">
              <h6>24:52</h6>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Sales Card -->
</div>
     


<div class="col-lg-12 observacao">
<h3>Observações: </h3>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, labore? Minima, natus at obcaecati dolore deserunt sapiente, perferendis vel vitae amet adipisci labore aliquam necessitatibus laborum consectetur. Distinctio, nam eos.</p>
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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