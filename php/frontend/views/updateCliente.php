<?php
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
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

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

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/addPorcinos" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Crear Porcino</p>
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
          <li class="nav-item">
            <a href="/cliente" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Ver Cliente</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
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

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <form action="/updateCliente" method="post" id="updateForm">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Editar Información del Cliente</h5>
                </div>
                <div class="card-body row">
                  <div class="col-md-12">
                  <input type="text" hidden value="<?php echo $_GET['id']?>" name="id">

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
                  <button type="button" class="btn btn-secondary" id="updateGraphQLBtn">Actualizar con GraphQL</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Your Company</a>.</strong> All rights reserved.
  </footer>
</div>

<!-- REQUIRED SCRIPTS -->
<script src="../Frontend/js/plugins/jquery.min.js"></script>
<script src="../Frontend/js/plugins/bootstrap.bundle.min.js"></script>
<script src="../Frontend/js/plugins/adminlte.min.js"></script>
<script>
  $(document).ready(function() {
    // Evento al hacer clic en el botón de actualizar
    $("#updateGraphQLBtn").click(function() {
      // Obtener los valores de los campos de entrada
      const id = $("input[name='id']").val();
      const nombre = $("input[name='nombre']").val();
      const edad = $("input[name='edad']").val();
      const identificacion = $("input[name='identificacion']").val();
      
      // Crear la mutación GraphQL
      const query = `
        mutation {
          updateCliente(_id: "${id}", Nombre: "${nombre}", Edad: ${edad}, identificacion: "${identificacion}") {
            _id
            Nombre
            Edad
            identificacion
          }
        }
      `;

      // Validar que los campos no estén vacíos antes de realizar la solicitud
      if (!id || !nombre || !edad || !identificacion) {
        alert('Todos los campos son obligatorios.');
        return;
      }

      // Realizar la solicitud AJAX al servidor GraphQL
      $.ajax({
        url: '/graphqlC', // Ruta del endpoint GraphQL
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({ query: query }),
        success: function(response) {
          // Manejar la respuesta del servidor
          if (response.errors) {
            alert('Error en la actualización: ' + response.errors[0].message);
          } else {
            alert('Cliente actualizado exitosamente');
            console.log(response);
          }
        },
        error: function(xhr, status, error) {
          // Manejar cualquier error en la solicitud
          alert('Error en la solicitud: ' + error);
          console.error(xhr);
        }
      });
    });
  });
</script>
</body>
</html>
