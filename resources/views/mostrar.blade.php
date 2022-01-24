<!DOCTYPE HTML>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Inicio</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<header>
        <div class="menu">
        <img src="logo.png" alt="">
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Zapatos</a></li>
                <li><a href="#">Ropa</a></li>
                <li><a href="#">Iniciar Sesión</a></li>
            </ul>
        </nav>
        </div>
    </header>
<body>
    <div class="header">
        <h1>Tienda Online</h1>
    </div>
    <div class="row">
        @foreach($listaProducto as $producto)
        <div class="column-4">
            <div class="gallery">
                <img src="{{asset('storage').'/'.$producto->foto_producto}}">
                <div>{{$producto->nombre_producto}}</div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row" id="footer">
        <div class="four-column">
            <h2>Creadores</h2>
            <p>Isaac Ortiz</p>
            <p>Raúl Santacruz</p>
        </div>
        <div class="four-column">
            <h2>Main Sponsors</h2>
            <p>Nike</p>
            <p>Adidas</p>
        </div>
    </div>
</body>
</html>