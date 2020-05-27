<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplement;
use App\Models\Produit;
use App\Models\Formule;
use Illuminate\Support\Facades\Auth;
use DB;
class PanierController extends Controller
{
    public function ajouterFormule(Request $request )
    {   \session_start();
        $_SESSION["formules"] [$request->id]=$request->qte;
        $_SESSION["qte"]+= $request->qte;

        return redirect('/formule');

    }
    public function ajouterProduit(Request $request )
    {   \session_start();
        $_SESSION["produits"] [$request->id]=$request->qte;
        $_SESSION["qte"]+= $request->qte;

        return redirect('/produit');

    }
    public function ajouterSupplement(Request $request )
    {   \session_start();
        $_SESSION["supplements"] [$request->id]=$request->qte;
        $_SESSION["qte"]+= $request->qte;
        return redirect('/supplement');

    }
    public function supprimerFormule(Request $request )
    {   \session_start();
        unset ($_SESSION["formules"][$request->id]);
        return redirect('/panier');

    }
    public function supprimerProduit(Request $request )
    {   \session_start();
        unset ($_SESSION["produits"][$request->id]);
        return redirect('/panier');

    }
    public function supprimerSupplement(Request $request )
    {   \session_start();
        unset ($_SESSION["supplements"][$request->id]);
        return redirect('/panier');

    }
    public function index(){
        \session_start();
        $p = array_keys($_SESSION["produits"])  ;
        $f = array_keys($_SESSION["formules"])  ;
        $s =  array_keys($_SESSION["supplements"]) ;
        $qte = $_SESSION["qte"];
        $produits = DB::table('produits')
        ->whereIn('id', $p)
        ->get();
        $formules = DB::table('formules')
        ->whereIn('id', $f)
        ->get();
        $supplements = DB::table('supplements')
        ->whereIn('id', $s)
        ->get();
        $prix=0;
        foreach ($produits as $produit){
            $prix+=$produit->prix*$_SESSION["produits"][$produit->id];
        }
        foreach ($formules as $formule){
            $prix+=$formule->prix*$_SESSION["formules"][$formule->id];
        }
        foreach ($supplements as $sup){
            $prix+=$sup->prix*$_SESSION["supplements"][$sup->id];
        }
        $_SESSION["prix"]=$prix;
        return view ("panier/home", [
            'produits' =>$produits,
            'formules' =>$formules,
            'supplements' =>$supplements,
            'qte'=>$qte,
            'pqte'=>$_SESSION["produits"],
            'fqte'=>$_SESSION["formules"],
            'sqte'=>$_SESSION["supplements"],
            'prix'=>$prix
        ]);
    }

    public function valider(){
        if (Auth::check()) {
             return redirect('/payer');
    }
    return redirect('/login');
}
public function payer(){
    \session_start();
    return view ("panier/payment", [
        'prix'=>$_SESSION["prix"]
    ]);}

    public function payment(Request $request){
        \Stripe\Stripe::setApiKey('sk_test_OGquSZIQbGX0wVisO95Cm8Wy00GP2ZaNKp');
        session_start();
        $token =$request->stripeToken;
        $charge =\Stripe\Charge::create([
            'amount' =>$_SESSION["prix"],
            'currency'=> 'usd',
            'description'=>'boite a pizza',
            'source' =>$token
        ]);
        $id = DB::table('commandes')->insertGetId(
            ['date' => '2020-05-20', 'adresse' => $request->adresse,
             'type' => 'pour tester c tt' , 'realiser' =>0, 'secteur' => 'secteur 1',
             'prix'=> $_SESSION["prix"], 'client_id'=>Auth::id() 
            ]
        );
        foreach ($_SESSION["formules"] as $k=> $formule){
            DB::table('commande_formule')->insertGetId(
                ['formule_id' => $k, 'commande_id' => $id,
                 'quantite'=> $formule,
                ]
            );
        }
        foreach ($_SESSION["produits"] as $k=> $produit){
            DB::table('commande_produit')->insertGetId(
                ['produit_id' => $k, 'commande_id' => $id,
                 'quantite'=> $produit,
                ]
            );
        }
        foreach ($_SESSION["supplements"] as $k=> $supplement){
            DB::table('commande_supplement')->insertGetId(
                ['supplement_id' => $k, 'commande_id' => $id,
                 'quantite'=> $supplement,
                ]
            );
        }
        $_SESSION["produits"]=array();
        $_SESSION["formules"]=array();
        $_SESSION["supplements"]=array();

       return redirect('/formule');
    }
}  
