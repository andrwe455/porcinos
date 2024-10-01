<?php
  // Obtener la información del cliente desde el controlador
  $controller = new Controller();
  $cliente = $controller->getClientById($_GET['id']); // Obtener un cliente por su ID
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Actualizar Cliente</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/48b7f93703.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Frontend/css/plugins/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/clientes" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Ver Clientes</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Actualizar Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Actualizar Cliente</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <form action="/updateCliente" method="post">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Editar Información del Cliente</h5>
                </div>
                <div class="card-body row">
                  <div class="col-md-12">
                    <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">

                    <div class="form-group">
                      <label for="nombre">Nombre del Cliente</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $cliente['nombre']; ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="edad">Edad</label>
                      <input type="number" class="form-control" name="edad" id="edad" value="<?php echo $cliente['edad']; ?>" required>
                    </div>

                    <div class="form-group">
                      <label for="identificacion">Identificación</label>
                      <input type="text" class="form-control" name="identificacion" id="identificacion" value="<?php echo $cliente['identificacion']; ?>" required>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Your Company</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="../Frontend/js/plugins/jquery.min.js"></script>
<script src="../Frontend/js/plugins/bootstrap.bundle.min.js"></script>
<script src="../Frontend/js/plugins/adminlte.min.js"></script>
</body>
</html>
