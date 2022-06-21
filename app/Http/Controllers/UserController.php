<?php

namespace App\Http\Controllers;

use App\Mail\VerifyYourCount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;

class

UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
        $password = $request->input('password');
        $validate = $request->input('validate');

        if (!$request->email || !$password || !$validate) {
            return response()->json(['error' => 'Faltan datos para poder registrarte'], 400);
        }

        $usuario = User::where('email', $request->email)->first();
        if ($usuario) {
            return response()->json(['error' => 'El correo ya esta registrado!'], 400);
        }

        if ($password != $validate) {
            return response()->json(['error' => 'Las contrasenas no coinciden!'], 400);
        }

        $user = new User();

        $user->name = $request->input('name');
        $user->lastname_pat = $request->input('apPat');
        $user->lastname_mat = $request->input('apMat');
        $user->email = $request->input('email');
        $user->password = Crypt::encryptString($password);
        $user->date_birth = $request->input('fecha_nacimiento');
        $user->status = "no Verificado";
        $user->save();
        Mail::to($user->email)->send(new VerifyYourCount($user->name));
        return response()->json(['message' => 'Usuario creado correctamente'], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (!$email || !$password)
            return response()->json(['error' => 'Faltan datos para iniciar sesion'], 400);

        $user = User::where("email", $email)->first();
        if (!$user){
            return response()->json(['error' => 'El correo no existe!'], 400);
        }
        $passDecrypt=Crypt::decryptString($user->password);
        if($password==$passDecrypt){
            return response()->json(['success'=>'Has iniciado sesion']);
        }else{
            return response()->json(['error'=>'error en las credenciales']);
        }

    }

    /**
     * Update the password for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateEmail(Request $request){

    }

    public function savePassword(Request $request)
    {
        $email = $request->input('email');  // email del usuario
        $password = $request->input('password');  // contraseña del usuario

        if (!$request->email || !$request->password)
            return response()->json(['error' => 'Faltan datos para iniciar sesion'], 400);

        $usuario = User::where("email", $request->email)->first();
        if (!$usuario)
            return response()->json(['error' => 'El correo no existe!'], 400);

        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
