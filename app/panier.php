<?php

namespace App;


class panier 

{
    public $produit_list =array();
    public $formule_list=array();
    public $supplement_list= array();
    public $prix_totale =0;
    public $qte_totale =0;

    function __construct(){
        $produit_list = array();
        $formule_list = array();
        $supplement_list =array();
        $prix_totale=1;
        $qte_totale=0;
    }

    function ajouterP($id, $qte){
        $produit_list[$id]=$qte;
        //$qte_totale+=$qte;
    }
    function ajouterF($id, $qte){
        $formule_list [$id]=$qte;
        //$qte_totale+=$qte;

    }
    function ajouterS($id, $qte){
        $supplement_list[$id]=$qte;
        //$qte_totale+=$qte;

    }
     /*function get_prix_totale()
    {
      return $this->$prix_totale;
    }*/
    /*function prix(){
        
         foreach ($produit_list as $p) $this->$prix_totale+$p;
         foreach ($formule_list as $p) $this->$prix_totale+$p;
         foreach ($supplement_list as $p) $this->$prix_totale+$p;
         return $this->$prix_totale;
    }*/
    /*public function __getProduit_list()
  {
    return $this->$produit_list;
  }
  public function __getFormule_list()
  {
    return $this->$formule_list;
  }
  public function __getSupplement_list()
  {
    return $this->$supplement_list;
  }*/
}
