<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';
    protected $fillable = [
        'name', 'categorie_id', 'user_id','prix','offre','qte','photo','description',
    ];
    public function user(){ return $this->belongsTo('App\User'); }
    public function categorie(){ return $this->belongsTo('App\Categorie'); }
}
