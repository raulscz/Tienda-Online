@if (!Session::get('nombre_admin'))
    <?php
        //Si la session no esta definida te redirige al login.
        return redirect()->to('/login')->send();
    ?>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mostrar Producto Admin</title>
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body class="mostrar">
    <div>
        <form action="{{url('crearAdmin')}}" method="GET">
            <button class= "boton" type="submit" name="Crear" value="Crear">Crear</button>
        </form>
        <form action="{{url('mostrarUsuarios')}}" method="GET">
            <button id="usuarios" class= "boton" type="submit" name="usuarios" value="usuarios">G. Usuarios</button>
        </form>
        <form action="{{url('logout')}}" method="GET">
            <button id="logout" class= "boton" type="submit" name="logout" value="logout">Logout</button>
        </form>
    </div>
    <div>
        <form action="{{url('buscar')}}" method="GET">
            <input type="text" class="Form" name="nombre_producto" placeholder="Nombre...">
            <input type="text" class="Form" name="tipo_producto" placeholder="Tipo...">
            <input type="text" class="Form" name="nombre_marca" placeholder="Marca...">
            <button class= "Form" type="submit" name="Buscar" value="Buscar">Buscar</button>
        </form>
        <br>
    </div>
    <div class="row flex-cv">
        <table class="table">
            <tr class="active">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>TIPO</th>
                <th>MARCA</th>
                <th>TALLA</th>
                <th>PRECIO</th>
                <th>CANTIDAD</th>
                <th>FOTO</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>
            </tr>
            @foreach($listaProducto as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->nombre_producto}}</td>
                    <td>{{$producto->tipo_producto}}</td>
                    <td>{{$producto->nombre_marca}}</td>
                    <td>{{$producto->talla_producto}}</td>
                    <td>{{$producto->precio_producto}}</td>
                    <td>{{$producto->cantidad_producto}}</td>
                    <td><img src="{{asset('storage').'/'.$producto->foto_producto}}" height="80" width="80"></td>
                    <td><form action="{{url('eliminarProducto/'.$producto->id)}}" method="POST">
                        @csrf
                        <!--{{csrf_field()}}--->
                        {{method_field('DELETE')}}
                        <!--@method('DELETE')--->
                        <button id="eliminar" class= "botonAcciones" type="submit" name="Eliminar" value="Eliminar">Eliminar</button>
                    </form></td>
                    <td><form action="{{url('modificarProducto/'.$producto->id)}}" method="GET">
                        <button id="modificar" class= "botonAcciones" type="submit" name="Modificar" value="Modificar">Modificar</button>
                    </form></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>