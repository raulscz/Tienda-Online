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
  <title>Formulario Crear Producto</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="crear">
    <div class="row flex-cv">
      <div class="cuadro_correo">
        <form action="{{url('recibirCorreo')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('POST')}}
          <h1>ENVIAR CORREO</h1>
          <br>
          <div class="form-group">
            <p>Para:</p>
            <div>
              <input class="inputcrear" type="text" name="correo_persona" value="{{$correo_user}}">
            </div>
          </div>
          <br>
          <div class="form-group">
            <p>Asunto:</p>
            <div>
              <input class="inputcrear" type="text" name="sub" placeholder="Introduce el asunto..." required>
            </div>
          </div>
          <br>
          <div class="form-group">
            <p>Mensaje:</p>
            <div>
                <textarea class="text_area" name="mensaje" rows="4" cols="50" placeholder="Introduce la marca..." required>

                </textarea>
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