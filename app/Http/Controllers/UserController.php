<?php

namespace App\Http\Controllers;

use App\Mail\PasswordSafe;
use App\Mail\VerifyYourCount;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;
use App\Mail\VerifyYourAcount;
use Illuminate\Support\Str;

class

UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $password = $request->input('password');
        $validate = $request->input('validate');
        $email=$request->input('email');
        $clave=mt_rand(5000,10000);

        if (!$email || !$password || !$validate) {
            return response()->json(['error' => 'Faltan datos para poder registrarte'], 400);
        }

        $usuario = User::where('email', $email)->first();
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
        $user->status = "No Verificado";
        $user->email_verified_at=$clave;
        $user->save();
        return response()->json(['message' => 'Usuario creado correctamente'], 201);
    }
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
            if($user->status=="Verificado"){
                return response()->json(['success'=>'Has iniciado sesion']);
            }else{
                Mail::to($email)->send(new VerifyYourAcount($user));
                return response()->json(['error'=>'debes validar tu correo revisa tu bandeja de entrada']);
            }
        }else{
            return response()->json(['error'=>'error en las credenciales']);
        }

    }


    public function savePassword(Request $request)
    {
        $email = $request->input('email');  // email del usuario
        $newPassword=Str::random(8);

        $user = User::where("email", $email)->first();
        if (!$user)
            return response()->json(['error' => 'El correo no existe!'], 400);
        $user->password=Crypt::encryptString($newPassword);
        $user->save();
        Mail::to($email)->send(new PasswordSafe($user));
        return response()->json(['success' => 'Se ha enviado tu nueva contraseña a tu correo']);
    }
    public function validateEmail(Request $request){
        $email=$request->input('email');
        $clave=$request->input('code');
        $user=User::where("email",$email)->first();
        if(!$user){
            return response()->json(['success' => 'El correo no existe']);
        }
        $tokenUser=$user->email_verified_at;
        if($clave==$tokenUser){
            $user->status="Verificado";
            $user->save();
            return response()->json(['success' => 'Se ha verificado correctamente tu correo']);
        }


    }
    public  function editPassword(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
        $newpassword=$request->input('newPassword');

        $user=User::where("email",$email)->first();
        if(!$user){
            return response()->json(['error' => 'las credenciales son incorrectas']);
        }
        $passDecrypt=Crypt::decryptString($user->password);
        if($password==$passDecrypt){
            $user->password=Crypt::encryptString($newpassword);
            $user->save();
            return response()->json(['success'=>'Se ha cambiado la contraseña correctamente']);
        }else{
            return response()->json(['error'=>'error en las credenciales']);
        }

    }



}
