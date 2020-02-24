<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Chapitres;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function ShowPageController(){
        return view('admin/admin');
    }
    public function ShowPageAddChapter(){
        return view('admin/addchapter');
    }
    public function ShowPageAddCours(){
        return view('admin/addcours');
    }
    public function ShowPageListUsers(User $member){
        $member = $member->select('*')->get();
        return view('admin/listofusers')->with('member', $member);
    }
    public function AddChapter(Request $data, Cours $donne, Chapitres $add){
        $cours = $data->cours;
        $newContent = $data->newChapContent;
        $id = $donne->select('id')->where('nom_cours', '=', $cours)->first()->id;
        $lastChap = count($donne->find($id)->ShowChap);

        if($lastChap >= 1)
        {
            $add->id_cours = $id;
            $add->n_chap = $lastChap + 1;
            $add->content_chap = $newContent;
            $add->save();
        }else{
            $add->id_cours = $id;
            $add->n_chap = 1;
            $add->content_chap = $newContent;
            $add->save();
        }

        return response()->json('ok');
    }
    public function AddCour(Request $data, Cours $newCour){
        $coursAct = htmlspecialchars($data->name);
        $newCour->nom_cours = $coursAct;
        $newCour->save();
        $lastInsertId = $newCour->id;
        $json = [];
        $json['lastId'] = $lastInsertId;
        $json['message'] = 'Le cours sur le '.$coursAct.' a bien été ajouté !';
        return response()->json($json);
    }
    public function DeleteCour(Request $data, Cours $delCour){
        $id = $data->id;
        $nomCours = $delCour->find($id)->nom_cours;
        $delCour->find($id)->delete();
        $json = 'Le cours '.$nomCours.' a bien été supprimé.';
        return response()->json($json);
    }
}
