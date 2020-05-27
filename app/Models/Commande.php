<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produit;
class Commande extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'commandes';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }
    public function produitsQte()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite');
    }
    public function formules()
    {
        return $this->belongsToMany(Formule::class);
    }
    public function formulesQte()
    {
        return $this->belongsToMany(Formule::class)->withPivot('quantite');
    }
    public function supplements()
    {
        return $this->belongsToMany(Supplement::class);
    }
    public function supplementsQte()
    {
        return $this->belongsToMany(Supplement::class)->withPivot('quantite');
    }
    public function client()
    {
        return $this->belongsTo(client::class);
    }
    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
