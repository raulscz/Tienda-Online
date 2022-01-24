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
        <form action="{{url('crearUsuario')}}" method="GET">
            <button class= "boton" type="submit" name="Crear" value="Crear">Crear</button>
        </form>
        <form action="{{url('mostrarProductoAdmin')}}" method="GET">
            <button id="usuarios" class= "boton" type="submit" name="usuarios" value="usuarios">G. Productos</button>
        </form>
        <form action="{{url('logout')}}" method="GET">
            <button id="logout" class= "boton" type="submit" name="logout" value="logout">Logout</button>
        </form>
    </div>
    <div>
        <form action="{{url('buscarUsuario')}}" method="GET">
            <input type="text" class="Form" name="nombre_user" placeholder="Nombre...">
            <input type="text" class="Form" name="correo_user" placeholder="Correo...">
            <input type="text" class="Form" name="tipo_user" placeholder="Tipo...">
            <button class= "Form" type="submit" name="Buscar" value="Buscar">Buscar</button>
        </form>
        <br>
    </div>
    <div class="row flex-cv">
        <table class="table">
            <tr class="active">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>FECHA NACIMIENTO</th>
                <th>CORREO</th>
                <th>TIPO</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>
                <th>CORREO</th>
            </tr>
            @foreach($listaUsuarios as $usuario)
                <tr>
                    <td>{{$usuario->id}}</td>
                    <td>{{$usuario->nombre_user}}</td>
                    <td>{{$usuario->apellido_user}}</td>
                    <td>{{$usuario->fecha_naix_user}}</td>
                    <td>{{$usuario->correo_user}}</td>
                    <td>{{$usuario->tipo_user}}</td>
                    <td><form action="{{url('eliminarUsuario/'.$usuario->id)}}" method="POST">
                        @csrf
                        <!--{{csrf_field()}}--->
                        {{method_field('DELETE')}}
                        <!--@method('DELETE')--->
                        <button id="eliminar" class= "botonAcciones" type="submit" name="Eliminar" value="Eliminar">Eliminar</button>
                    </form></td>
                    <td><form action="{{url('modificarUsuario/'.$usuario->id)}}" method="GET">
                        <button id="modificar" class= "botonAcciones" type="submit" name="Modificar" value="Modificar">Modificar</button>
                    </form></td>
                    <td><form action="{{url('correoPersona/'.$usuario->correo_user)}}" method="GET">
                        <button id="correo" class= "botonAcciones" type="submit" name="Correo" value="Correo">Correo</button>
                    </form></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>