<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapitres extends Model
{
    protected $table = 'chapitre';
    public $timestamps = true;
    public function ShowCours(){
        return $this->belongsTo('App\Models\Cours', 'id_cours', 'id');
    }
}
