@if (!Session::get('nombre_admin'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/login')->send();
    ?>
@endif
<!DOCTYPE HTML>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Formulario Crear Usuario</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="crear">
    <div class="row flex-cv">
      <div class="cuadro_crear">
        <form action="{{url('crearUsuario')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('POST')}}
          <h1>CREAR USUARIO</h1>
          <div class="form-group">
            <p>Nombre Usuario:</p>
            <div>
              <input class="inputcrear" type="text" name="nombre_user" placeholder="Introduce el nombre..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Apellido Usuario:</p>
            <div>
              <input class="inputcrear" type="text" name="apellido_user" placeholder="Introduce el apellido..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Fecha Nacimiento:</p>
            <div>
              <input class="inputcrear" type="date" name="fecha_naix_user" max="" required>
            </div>
          </div>
          <div class="form-group">
            <p>Correo Usuario:</p>
            <div>
              <input class="inputcrear" type="text" name="correo_user" placeholder="Introduce el correo..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Contraseña Usuario:</p>
            <div>
              <input class="inputcrear" type="password" name="pass_user" placeholder="Introduce la contraseña..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Tipo Usuario:</p>
            <div>
                <select name="tipo_user" class="inputcrear" required>
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                </select>
            </div>
          </div>
          <br>
          <div class="form-group">
            <button class= "botoncrear" type="submit" name="register" value="register">Crear</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>