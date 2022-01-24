<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Exception;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class ProductoController extends Controller
{

    /*Mostrar*/
    public function mostrarProductos(){
        $listaProducto = DB::table('tbl_marca')->join('tbl_product','tbl_marca.id','=','tbl_product.id_marca')->select('*')->get();
        return view('mostrar', compact('listaProducto'));
    }

    public function mostrarProductoAdmin(){
        $listaProducto = DB::table('tbl_marca')->join('tbl_product','tbl_marca.id','=','tbl_product.id_marca')->select('*')->get();
        return view('mostrarProductoAdmin', compact('listaProducto'));
    }

    /*Crear*/
    public function crearProducto(){
        return view('crearAdmin');
    }

    public function crearProductoPost(Request $request){
        $datos = $request->except('_token');
        $marca = DB::table('tbl_marca')->where('nombre_marca','=',$datos['nombre_marca'])->count();
        if($request->hasFile('foto_producto')){
            $datos['foto_producto'] = $request->file('foto_producto')->store('uploads','public');
        }else{
            $datos['foto_producto'] = NULL;
        }
        if($marca == 0){
            try{
                DB::beginTransaction();
                $id = DB::table('tbl_marca')->insertGetId(["nombre_marca"=>$datos['nombre_marca']]);
                DB::table('tbl_product')->insertGetId(["nombre_producto"=>$datos['nombre_producto'],"tipo_producto"=>$datos['tipo_producto'],"id_marca"=>$id,"talla_producto"=>$datos['talla_producto'],"precio_producto"=>$datos['precio_producto'],"cantidad_producto"=>$datos['cantidad_producto'],"foto_producto"=>$datos['foto_producto']]);
                DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                return $e->getMessage();
            }
        }else{
            $id = DB::table('tbl_marca')->select('id')->where('nombre_marca','=',$datos['nombre_marca'])->first();
            try{
                DB::beginTransaction();
                DB::table('tbl_product')->insertGetId(["nombre_producto"=>$datos['nombre_producto'],"tipo_producto"=>$datos['tipo_producto'],"id_marca"=>$id->id,"talla_producto"=>$datos['talla_producto'],"precio_producto"=>$datos['precio_producto'],"cantidad_producto"=>$datos['cantidad_producto'],"foto_producto"=>$datos['foto_producto']]);
                DB::commit();
            }catch(\Exception $e){
                DB::rollBack();
                return $e->getMessage();
            }
        }
        return redirect('mostrarProductoAdmin');
    }

    /*Actualizar*/
    public function modificarProducto($id){
        $Producto = DB::table('tbl_marca')->join('tbl_product','tbl_marca.id','=','tbl_product.id_marca')->select('*')->where('tbl_product.id','=',$id)->first();
        return view('modificarAdmin', compact('Producto'));
    }

    public function modificarProductoPut(Request $request){
        $datos = $request->except('_token','_method','nombre_marca');
        if ($request->hasFile('foto_producto')) {
            $foto = DB::table('tbl_product')->select('foto_producto')->where('id','=',$request['id'])->first();
            if ($foto->foto_producto != null) {
                Storage::delete('public/'.$foto->foto_producto);
            }
            $datos['foto_producto'] = $request->file('foto_producto')->store('uploads','public');
        }else{
            $foto = DB::table('tbl_product')->select('foto_producto')->where('id','=',$request['id'])->first();
            $datos['foto_producto'] = $foto->foto_producto;
        }
        //$datostelf=$request->except('_token','_method','nombre_persona','apellido_persona','dni_persona','edad_persona','id','foto_persona');
        try {
            DB::beginTransaction();
            //DB::table('tbl_telef')->where('id_telf','=',$datostelf['id_telf'])->update($datostelf);
            DB::table('tbl_product')->where('id','=',$datos['id'])->update($datos);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        //return $datos;
        return redirect('mostrarProductoAdmin');
    }

    /*Eliminar*/
    public function eliminarProducto($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_product')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarProductoAdmin');
    }

    /*Filtrar*/
    public function buscarProducto(Request $request){
        $datos = $request->except('_token');
        $nombre = $datos['nombre_producto'];
        $tipo = $datos['tipo_producto'];
        $marca = $datos['nombre_marca'];

        $listaProducto = DB::table('tbl_marca')->join('tbl_product','tbl_marca.id','=','tbl_product.id_marca')->where('nombre_producto','LIKE',"%$nombre%")->where('tipo_producto','LIKE',"%$tipo%")->where('nombre_marca','LIKE',"%$marca%")->get();
        return view('mostrarProductoAdmin', compact('listaProducto'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
