<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function AddUser(Request $data, User $reg){
        $name = $data->name;
        $mdp = bcrypt($data->mdp);
        $mail = $data->mail;

        $reg->name = $name;
        $reg->email = $mail;
        $reg->password = $mdp;
        $reg->rights = 0;
        $reg->save();
        return response()->json('Utilisateur bien ajouté ! :)');
    }
    public function LoginUser(Request $data){
        $response = [];
        if(Auth::attempt(['name' => $data->name, 'password' => $data->mdp]))
        {   
            $response['message'] = 'Vous êtes bien connecté ! Bienvenue '. $data->name .' !';
            $response['valid'] = true;
        }else{
            $response['message'] = 'Erreur : '.$data->name.' '.$data->mdp;
            $response['valid'] = false;
        }
        return response()->json($response);
    }

    public function LogOutUser(){
        Auth::logout();
        return redirect('/');
    }
}
