<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use Auth;
use App\Produit;
class CategorieController extends Controller
{
    public function index()
    {
        $categories=Categorie::paginate(8);
        return view('categories')->with('categories',$categories);
    }
    public function add(Request $request)
    {
        $categorie =new Categorie;
        $categorie->name=$request->input('name');
        $categorie->description=$request->input('description');
        $categorie->user_id=Auth::user()->id;
        $categorie->save();
        session()->flash('success','la nouvelle categorie a été enregistrer correctement!');
        return back()->withInput();
    }
    public function delete($id){
        $cat=Categorie::find($id);
        if($cat)
        {
            $cat->delete();
            session()->flash('success','supprimer');
        }
        return back()->withInput();
    }

    public function update($id,Request $request)
    {
        $cat=Categorie::find($id);
        if($cat)
        {
            $cat->name=$request->input('name');
            $cat->description=$request->input('description');
            $cat->save();
            session()->flash('success','modifer');
        }
        return back()->withInput();
        
    }
    public function detail($id)
    {
        $categorie=Categorie::find($id);
        $produits=Produit::where('categorie_id',$categorie->id)->get();
        return view('detailcategorie')->with('produits',$produits)->with('categorie',$categorie);
    }
    public function android()
    {
     
            return response()->json(Categorie::with(['produit'=> function($query){
                $query->orderby('created_at','desc');
            }])->groupBy('id')->get(),200);
        
    }
}
