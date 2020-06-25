<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use Auth;
class ProduitController extends Controller
{
    public function index()
    {
        $produits=Produit::paginate(8);
        return view('produits')->with('produits',$produits);
    }
    public function update(Request $request,$id)
    {
        if($request->has('photo'))
        {
           $model = $request->file('photo');
           $filephoto = time(). Auth::user()->id .'.'.$model->extension();  
           $request->file('photo')->move(public_path('/produits/'), $filephoto);
        }
        $produit=Produit::find($id);

    $produit->update(array_merge($request->all(),['photo' => 'http://localhost:8000/produits/'.$filephoto]));
        session()->flash('success','modifer');
        return back()->withInput();

    }
    public function delete($id)
    {
        $produit=Produit::find($id);
        if($produit)
        {
            $produit->delete();
            session()->flash('success','supprimer');
        }
        return back()->withInput();
    }
    public function add(Request $request)
    {
        if($request->has('photo'))
        {
           $model = $request->file('photo');
           $filephoto = time(). Auth::user()->id .'.'.$model->extension();  
           $request->file('photo')->move(public_path('/produits/'), $filephoto);
        }
        $produit=Produit::create(array_merge($request->all(), ['user_id' => Auth::user()->id,'photo' => $filephoto]));
        session()->flash('success','la nouvelle produit a été enregistrer correctement!');
        return back()->withInput();
    }


    public function search(Request $request)
    {
        $search=$request->input('text');
        $categorie_id=$request->input('categorie_id');
if($categorie_id)
{
        $produits=Produit::where('categorie_id',$categorie_id)
        ->paginate(8);
}
else{
    $produits=Produit::where('categorie_id',$categorie_id)
    ->where('name','like','%'.$search.'%')
    ->orwhere('prix','like','%'.$search.'%')
    ->orwhere('offre','like','%'.$search.'%')
    ->orwhere('qte','like','%'.$search.'%')
    ->orwhere('description','like','%'.$search.'%')
    ->orderBy('created_at', 'desc')
    ->paginate(8);  
}     
       return view('produits')->with('produits',$produits);
       dump($request); 
    }
}
