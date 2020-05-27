<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formule;
use App\Panier;
class FormuleController extends Controller
{
    public function init(){
        session_start();
        
        //session_register("mySessionVariable");
        //$_SESSION["panier"]=  Panier();
        $_SESSION["produits"]=  array();
        $_SESSION["formules"]= array();
        $_SESSION["supplements"]= array();
        $_SESSION["qte"]= 0;
        return view ("welcome");
    }
    public function index(){
        session_start();
        $formules = Formule::all();
        
        return view ("formule/home", [
            'formules' =>$formules
        ]);
    }
    public function view($id){
        $formule = Formule::findOrfail($id);
        
        return view ("formule/formule", [
            'formule' =>$formule
        ]);
    }
    
}
