<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Element; 
class ProduitController extends Controller
{
    public function index(){
        $pizzas = Produit::all()->where('categorie_id','=',1);
        $salades = Produit::all()->where('categorie_id','=',4);
        $boissons = Produit::all()->where('categorie_id','=',2);
        
        return view ("produit/home", [
            'pizzas' =>$pizzas,
            'salades' =>$salades,
            'boissons'=>$boissons
        ]);
    }
    public function view($id){
        $produit = Produit::findOrfail($id);
        
        $elements =  DB::table('elements')->select('nom')->join('element_produit', function ($join ) use ($id) {
           $join->on('elements.id', '=', 'element_produit.element_id')
                 ->where('element_produit.produit_id', '=', $id);
        })->get();
        /*$elements = Element::where(function ($query) use ($id) {
            $query->select('element_id')
                ->from('element_produit')
                ->whereColumn('element_produit.produit_id', '=',$id);
        })->get();*/
        
        return view ("produit/produit", [
            'produit' =>$produit,
            'elements' =>$elements,

        ]);
    }
}


