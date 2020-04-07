<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    //use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
        $this->crud->addField([ 
            'label' => "Categorie",
            'type' => 'select2',
            'name' => 'categorie_id', 
            'entity' => 'categorie', 
            'attribute' => 'name', 
            'model' => "App\Models\Categorie"
        ]);
        $this->crud->addField([ 
            'label' => "image",
            'type' => 'image',
            'name' => 'imgPath', 
            'upload' => true,
            'crop' => true, 
            'aspect_ratio' => 1, 
            'disk' => 'public', // in case you need to show images from a different disk
            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
            
        ]);
        
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $field1=['label' => "name",
        'type' => 'text',
        'name' => 'name', ];
        $field2=['label' => "Category",
        'type' => 'text',
        'name' => 'Categorie.name', ];
        $field3=['label' => "price",
        'type' => 'double',
        'name' => 'prix', ];
        $field4=['label' => "remise",
        'type' => 'text',
        'name' => 'remise', ];
        $field5=['label' => "promo",
        'type' => 'boolean',
        'name' => 'isPromo', ];
        $field6=[
            'label'=>'image',
            'type' => 'image',
            'name' => 'imgPath',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => '80px',
        ];
        $this->crud->addColumns([$field6,$field1,$field2,$field3,$field4,$field5]);

        
        }
    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProduitRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $field1=['label' => "name",
        'type' => 'text',
        'name' => 'name', ];
        $field2=['label' => "Category",
        'type' => 'text',
        'name' => 'Categorie.name', ];
        $field3=['label' => "price",
        'type' => 'double',
        'name' => 'prix', ];
        $field4=['label' => "remise",
        'type' => 'text',
        'name' => 'remise', ];
        $field5=['label' => "promo",
        'type' => 'boolean',
        'name' => 'isPromo', ];
        $field6=[
            'label'=>'image',
            'type' => 'image',
            'name' => 'imgPath',
            'prefix' => 'storage/',
            'height' => '120px',
            'width' => '120px',
        ];
        $this->crud->addColumns([$field6,$field1,$field2,$field3,$field4,$field5]);
    }
}
