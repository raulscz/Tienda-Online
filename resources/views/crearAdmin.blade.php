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
      <div class="cuadro_crear">
        <form action="{{url('crearAdmin')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('POST')}}
          <h1>CREAR PRODUCTO</h1>
          <div class="form-group">
            <p>Nombre Producto:</p>
            <div>
              <input class="inputcrear" type="text" name="nombre_producto" placeholder="Introduce el nombre...">
            </div>
          </div>
          <div class="form-group">
            <p>Tipo Producto:</p>
            <div>
              <input class="inputcrear" type="text" name="tipo_producto" placeholder="Introduce el tipo..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Marca:</p>
            <div>
              <input class="inputcrear" type="text" name="nombre_marca" placeholder="Introduce la marca..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Talla:</p>
            <div>
              <input class="inputcrear" type="text" name="talla_producto" placeholder="Introduce la talla..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Precio:</p>
            <div>
              <input class="inputcrear" type="number" name="precio_producto" placeholder="Introduce el precio..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Cantidad:</p>
            <div>
              <input class="inputcrear" type="number" name="cantidad_producto" placeholder="Introduce la cantidad..." required>
            </div>
          </div>
          <div class="form-group">
            <p>Foto:</p>
            <div>
              <input type="file" name="foto_producto" required>
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