<?php
session_start() or die('A sessão não pode ser iniciada');

//if (!isset($_SESSION['id'])){
  //header("Location: login.html");
//}
?>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Platform CRHR">
  <meta name="author" content="Dev Waves">

  <title>Plataforma CRHR - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="./vendor/fontawesome-free/css/all.css" rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin-2.css" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-text mx-2">Plataforma de ocorrências</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Úteis
      </div>

      <!-- Nav Item - Condomínios -->
      <li class="nav-item">
        <a class="nav-link" href="condomino.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Condôminos</span></a>
      </li>

      <!-- Nav Item - Usuários -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-folder"></i>
          <span>Usuários</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Sair
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ocorrência</h1>
          </div>

          <form class="form-subscribe needs-validation" action="addOccurrence.php" method="POST"
            enctype="multipart/form-data" novalidate>
            <div class="form-group row">
              <label for="date" class="col-sm-2 col-form-label">Data negociada</label>
              <div class="col-sm-6">
                <input type="date" class="form-control" id="date" name="date">
              </div>
            </div>
            <div class="form-group row">
              <label for="obs" class="col-sm-2 col-form-label">Observação</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="obs" name="obs" placeholder="Observação">
              </div>
            </div>
            <div class="form-group row">
              <label for="value" class="col-sm-2 col-form-label">Valor</label>
              <div class="col-sm-4">
                <div class="input-group mb-3">
                  <span class="input-group-text">R$</span>
                  <input type="text" class="form-control money" id="value" name="value" placeholder="1.800,00">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="condomino" class="col-sm-2 col-form-label">Condômino</label>
              <div class="col-sm-4">
                <select id="condomino" name="condomino" class="form-control">
                  <option selected>Escolher...</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="status" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-4">
                <select id="status" name="status" class="form-control">
                  <option selected>Escolher...</option>
                  <option value=1>Pago</option>
                  <option value=2>Não Pago</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-2">Opção</div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="gridCheck1" name="hasInstallments"
                    onclick="habilitar()">
                  <label class="form-check-label" for="gridCheck1">
                    Parcela
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="qtdInstallments" class="col-sm-2 col-form-label">Quantidade parcela</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="qtdInstallments" name="qtdInstallments" placeholder="2"
                  disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="valueInstallments" class="col-sm-2 col-form-label">Valor da parcela</label>
              <div class="col-sm-4">
                <div class="input-group mb-3">
                  <span class="input-group-text">R$</span>
                  <input type="text" class="form-control money" id="valueInstallments" name="valueInstallments"
                    placeholder="500,00" disabled>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="attachment" class="col-sm-2 col-form-label">Anexos</label>
              <div class="col-sm-6">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="customFile" name="files[]"
                    accept=".jpg, .jpeg, .png, .pdf" multiple>
                  <label class="custom-file-label" for="customFile">Escolher arquivo</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" id="submitButton" class="btn btn-primary">Criar</button>
              </div>
            </div>
          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <!--<a href="https://www.devwaves.dev">-->
            <span>Copyright &copy; Dev Waves 2021</span>
            <!--</a>-->
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="./vendor/jquery/jquery.js"></script>
  <script src="./vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="./vendor/jquery-easing/jquery.easing.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="./js/sb-admin-2.js"></script>

  <script>
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function(form) {
      form.addEventListener('submit', function(event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })

  $('.money').mask('000.000.000.000.000,00', {
    reverse: true
  });

  $(".money").change(function() {
    $("#value").html($(this).val().replace(/\D/g, ''))
  })

  function habilitar() {
    if (document.getElementById('gridCheck1').checked) {
      document.getElementById('qtdInstallments').removeAttribute("disabled");
      document.getElementById('valueInstallments').removeAttribute("disabled");
    } else {
      document.getElementById('qtdInstallments').value = '';
      document.getElementById('valueInstallments').value = '';

      document.getElementById('qtdInstallments').setAttribute("disabled", "disabled");
      document.getElementById('valueInstallments').setAttribute("disabled", "disabled");
    }
  }

  $(document).ready(function() {
    $.ajax({
      type: "GET",
      url: "getCondomino.php",
      async: true,
      success: function(data) {
        console.log(data);
        $("#condomino").append(data);
      }
    });
  });
  </script>

</body>

</html>
