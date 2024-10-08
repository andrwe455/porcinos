<?php

  $controller = new Controller();
  $data = $controller->getPorcinosInfo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Porcinos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/48b7f93703.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Frontend/css/plugins/adminlte.min.css">
  <link rel="stylesheet" href="../Frontend/css/plugins/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../Frontend/css/plugins/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../Frontend/css/plugins/buttons.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/addPorcinos" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                  Crear Porcino
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
            
          <li class="nav-item">
            <a href="updatePorcinos" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Actualizar Porcino</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="erporcinos" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Eliminar Porcino</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/porcinos" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ver Porcino</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/addCliente" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Crear Cliente</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="updateCliente" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Actualizar Cliente</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="ercliente" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Eliminar Cliente</p>
            </a>
          </li>
            
          </li>
          <li class="nav-item">
            <a href="/cliente" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Ver Cliente
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Porcinos</h3>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="row">
                          <div class="col-sm-12">
                              <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                                  <thead>
                                      <tr>
                                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending">
                                              id Porcino
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending">
                                              Raza
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="QR: activate to sort column ascending">
                                            Edad
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="QR: activate to sort column ascending">
                                            Peso
                                          </th>
                                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="QR: activate to sort column ascending">
                                            Cliente
                                          </th>
                                          <th>
                                            Descipcion alimentacion
                                          </th>
                                          <th>
                                            Dosificacion
                                          </th>
                                          <th>
                                            Actualizar
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody class="text-center">
                                      <?php 
                                        foreach ($data as $porcino) {
                                          echo "<tr>";
                                          echo "<td>".$porcino['identificacion']."</td>";
                                          echo "<td>".$porcino['Raza']."</td>";
                                          echo "<td>".$porcino['Edad']."</td>";
                                          echo "<td>".$porcino['Peso']."</td>";
                                          echo "<td>".$porcino['Cliente']."</td>";
                                          echo "<td>".$porcino['Alimentacion']['Descripcion']."</td>";
                                          echo "<td>".$porcino['Alimentacion']['dosis']."</td>";
                                          echo "<td><a href='/updatePorcinos?id=".$porcino['_id']."'class='nav-link'>Actualizar</a></td>";
                                          echo "</tr>";
                                        }
                                      ?>  
                                  </tbody>
                                  <tfoot>
                                      <tr>
                                          <th rowspan="1" colspan="1">id Porcino</th>
                                          <th rowspan="1" colspan="1">Raza</th>
                                          <th rowspan="1" colspan="1">Edad</th>
                                          <th rowspan="1" colspan="1">Peso</th>
                                          <th rowspan="1" colspan="1">Cliente</th>
                                          <th rowspan="1" colspan="1">Descipcion alimentacion</th>
                                          <th rowspan="1" colspan="1">Dosificacion</th>
                                          <th rowspan="1" colspan="1">Actualizar</th>
                                      </tr>
                                  </tfoot>
                              </table>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="frontend/js/plugins/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="frontend/js/plugins/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="frontend/js/plugins/jquery.dataTables.min.js"></script>
<script src="frontend/js/plugins/dataTables.bootstrap4.min.js"></script>
<script src="frontend/js/plugins/dataTables.responsive.min.js"></script>
<script src="frontend/js/plugins/dataTables.buttons.min.js"></script>
<script src="frontend/js/plugins/buttons.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="frontend/js/plugins/adminlte.min.js"></script>
<script src="frontend/js/plugins/jszip.min.js"></script>
<script src="frontend/js/plugins/pdfmake.min.js"></script>
<script src="frontend/js/plugins/vfs_fonts.js"></script>
<script src="frontend/js/plugins/buttons.html5.min.js"></script>
<script src="frontend/js/plugins/buttons.print.min.js"></script>
<script src="frontend/js/plugins/buttons.colVis.min.js"></script>

<script>
$("#example1").DataTable({
  "responsive": true, "lengthChange": false, "autoWidth": false,
  "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
</script>
<script>
    document.getElementById('graphqlBtn').addEventListener('click', function() {
        const query = `
            query {
                getPorcinos {
                    identificacion
                    Raza
                    Edad
                    Peso
                    Cliente
                    Alimentacion {
                        Descripcion
                        dosis
                    }
                }
            }
        `;

        // Hacer la solicitud GraphQL al servidor
        fetch('/graphql', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({
                query: query
            })
        })
        .then(response => response.json())
        .then(data => {
            const porcinos = data.data.getPorcinos;
            let tbody = document.querySelector("#example1 tbody");
            tbody.innerHTML = ""; // Limpiar la tabla

            porcinos.forEach(porcino => {
                let row = `
                    <tr>
                        <td>${porcino.identificacion}</td>
                        <td>${porcino.Raza}</td>
                        <td>${porcino.Edad}</td>
                        <td>${porcino.Peso}</td>
                        <td>${porcino.Cliente}</td>
                        <td>${porcino.Alimentacion.Descripcion}</td>
                        <td>${porcino.Alimentacion.dosis}</td>
                    </tr>
                `;
                tbody.innerHTML += row;
            });
        })
        .catch(error => {
            console.error('Error al obtener datos con GraphQL:', error);
        });
    });
</script>

</body>
</html>
