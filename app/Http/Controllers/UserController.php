<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registrar(Request $request){
    	$dados = $request->all();
    	if(!User::where('email', $dados['email'])->count()){
    		$dados['password'] = bcrypt($dados['password']);
    		$user = User::create($dados);
    		return response()->json(['data'=>$user, 'status'=>true]);
    	}else{
    		return response()->json(['data'=>'Usuário cadastrado!', 'status'=>false]);
    	}

    }
}
