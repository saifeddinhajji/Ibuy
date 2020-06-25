<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'description', 'user_id',
    ];

    public function user(){ return $this->belongsTo('App\User'); }
    public function produit(){
        return $this->hasMany('App\Produit');
        }
}
