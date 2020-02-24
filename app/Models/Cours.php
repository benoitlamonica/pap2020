<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $table = 'cours';
    public $timestamps = true;
    public function ShowChap(){
        return $this->hasMany('App\Models\Chapitres', 'id_cours', 'id');
    }
}
