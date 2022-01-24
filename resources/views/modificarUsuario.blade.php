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
  <title>Formulario Modificar Usuario</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="crear">
    <div class="row flex-cv">
      <div class="cuadro_crear">
        <form action="{{url('modificarUsuario')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('PUT')}}
          <h1>ACTUALIZAR USUARIO</h1>
          <div class="form-group">
            <p>Nombre Usuario:</p>
            <div>
              <input class="inputcrear" type="text" name="nombre_user" value="{{$user->nombre_user}}">
            </div>
          </div>
          <div class="form-group">
            <p>Apellido Usuario:</p>
            <div>
              <input class="inputcrear" type="text" name="apellido_user" value="{{$user->apellido_user}}">
            </div>
          </div>
          <div class="form-group">
            <p>Fecha Nacimiento:</p>
            <div>
              <input class="inputcrear" type="date" name="fecha_naix_user" value="{{$user->fecha_naix_user}}">
            </div>
          </div>
          <div class="form-group">
            <p>Correo Usuario:</p>
            <div>
              <input class="inputcrear" type="text" name="correo_user" value="{{$user->correo_user}}">
            </div>
          </div>
          <div class="form-group">
            <p>Contraseña Usuario:</p>
            <div>
              <input class="inputcrear" type="password" name="pass_user" value="{{$user->pass_user}}">
            </div>
          </div>
          <div class="form-group">
            <p>Tipo Usuario:</p>
            <div>
              <input class="inputcrear" type="text" name="tipo_user" value="{{$user->tipo_user}}">
            </div>
          </div>
          <br>
          <div class="form-group">
              <input type="hidden" name="id" value="{{$user->id}}">
            <button class= "botoncrear" type="submit" value="register">Modificar</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>