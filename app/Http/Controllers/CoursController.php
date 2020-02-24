<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cours;
use App\Models\Chapitres;

class CoursController extends Controller
{
    public function ShowSelectedCours($cours, $chap){
        $getDataCours = Cours::select('*')
                        ->join('chapitre', 'chapitre.id_cours','=','cours.id')
                        ->where('cours.nom_cours', '=', $cours)
                        ->where('chapitre.n_chap', "=", $chap)
                        ->first();
        $getNbChap = Chapitres::select('*')
                    ->where('id_cours', '=', $getDataCours->id_cours)
                    ->get();
        $nbChap = count($getNbChap);

        return view('cours/cours')
                ->with('content', $getDataCours->content_chap)
                ->with('nChap', $getDataCours->n_chap)
                ->with('nbChap', $nbChap)
                ->with('nomCours', $getDataCours->nom_cours);
    }
}
