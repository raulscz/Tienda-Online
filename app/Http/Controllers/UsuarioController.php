<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Exception;
use App\Mail\EnviarMensaje;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    /*Login*/
    public function login(){
        return view('login');
    }

    public function loginPost(Request $request){
        $datos = $request->except('_token','_method');
        try{
            DB::beginTransaction();
            $user = DB::table("tbl_user")->where('correo_user','=',$datos['correo_user'])->where('pass_user','=',$datos['pass_user'])->count();
            if($user ==1){
                $rol = DB::table("tbl_user")->select("tipo_user")->where('correo_user','=',$datos['correo_user'])->where('pass_user','=',$datos['pass_user'])->first();
                if($rol->tipo_user =="Administrador"){
                    $request->session()->put('nombre_admin',$request->correo_user);
                    return redirect('/mostrarProductoAdmin');
                }else{
                    $request->session()->put('nombre_user',$request->correo_user);
                }
                return redirect('/mostrar');
                DB::commit();
            }else{
                return redirect('/login');
            }
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function logout(Request $request){
        //Olvidas
        $request->session()->forget('nombre_admin');
        //Eliminar todo
        $request->session()->flush();
        return redirect('/login');
    }

    /*Mostrar*/
    public function mostrarUsuarios(){
        $listaUsuarios = DB::table('tbl_user')->get();
        return view('mostrarUsuarios', compact('listaUsuarios'));
    }

    /*Crear*/
    public function crearUsuario(){
        return view('crearUsuario');
    }

    public function crearUsuarioPost(Request $request){
        $datos = $request->except('_token');
        try{
            DB::beginTransaction();
            DB::table('tbl_user')->insertGetId(["nombre_user"=>$datos['nombre_user'],"apellido_user"=>$datos['apellido_user'],"fecha_naix_user"=>$datos['fecha_naix_user'],"correo_user"=>$datos['correo_user'],"pass_user"=>$datos['pass_user'],"tipo_user"=>$datos['tipo_user']]);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarUsuarios');
    }

    /*Actualizar*/
    public function modificarUsuario($id){
        $user=DB::table('tbl_user')->select()->where('id','=',$id)->first();
        return view('modificarUsuario', compact('user'));
    }

    public function modificarUsuarioPut(Request $request){
        $datos = $request->except('_token','_method');
        try{
            DB::beginTransaction();
            DB::table("tbl_user")->where('id','=',$datos['id'])->update($datos);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarUsuarios');
    }

    /*Eliminar*/
    public function eliminarUsuario($id){
        try{
            DB::beginTransaction();
            DB::table('tbl_user')->where('id','=',$id)->delete();
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }
        return redirect('mostrarUsuarios');
    }

    /*Filtro*/
    public function buscarUsuario(Request $request){
        $datos = $request->except('_token');
        $nombre = $datos['nombre_user'];
        $correo = $datos['correo_user'];
        $tipo = $datos['tipo_user'];

        $listaUsuarios = DB::table('tbl_user')->where('nombre_user','LIKE',"%$nombre%")->where('correo_user','LIKE',"%$correo%")->where('tipo_user','LIKE',"%$tipo%")->get();
        return view('mostrarUsuarios', compact('listaUsuarios'));
    }

    /*Correo*/
    public function correoPersona($correo_user){
        return view('mostrarCorreo',compact('correo_user'));
    }

    public function recibirCorreo(Request $request){
        $form = $request->except('_token');
        $msj = $form['mensaje'];
        $sub = $form['sub'];
        $datos = array('message'=>$msj);
        $enviar = new EnviarMensaje($datos);
        $enviar -> sub = $sub;
        Mail::to($form['correo_persona'])->send($enviar);
        return redirect('/mostrar');
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
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
