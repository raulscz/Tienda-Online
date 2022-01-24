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
        <form action="{{url('modificarProducto')}}" method="POST" enctype="multipart/form-data">
          @csrf
          {{method_field('PUT')}}
          <h1>ACTUALIZAR PRODUCTO</h1>
          <div class="form-group">
            <p>Nombre Producto:</p>
            <div>
              <input class="inputcrear" type="text" name="nombre_producto" value="{{$Producto->nombre_producto}}">
            </div>
          </div>
          <div class="form-group">
            <p>Tipo Producto:</p>
            <div>
              <input class="inputcrear" type="text" name="tipo_producto" value="{{$Producto->tipo_producto}}">
            </div>
          </div>
          <div class="form-group">
            <p>Marca:</p>
            <div>
              <input class="inputcrear" type="text" name="nombre_marca" value="{{$Producto->nombre_marca}}">
            </div>
          </div>
          <div class="form-group">
            <p>Talla:</p>
            <div>
              <input class="inputcrear" type="text" name="talla_producto" value="{{$Producto->talla_producto}}">
            </div>
          </div>
          <div class="form-group">
            <p>Precio:</p>
            <div>
              <input class="inputcrear" type="number" name="precio_producto" value="{{$Producto->precio_producto}}">
            </div>
          </div>
          <div class="form-group">
            <p>Cantidad:</p>
            <div>
              <input class="inputcrear" type="number" name="cantidad_producto" value="{{$Producto->cantidad_producto}}">
            </div>
          </div>
          <div class="form-group">
            <p>Foto:</p>
            <div>
              <input type="file" name="foto_producto" value="{{$Producto->foto_producto}}">
            </div>
          </div>
          <br>
          <div class="form-group">
              <input type="hidden" name="id" value="{{$Producto->id}}">
              <input type="hidden" name="id_marca" value="{{$Producto->id_marca}}">
            <button class= "botoncrear" type="submit" value="register">Modificar</button>
          </div>
        </form>
      </div>
    </div>
</body>
</html>