<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
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
        $this->crud->setEntityNameStrings('client', 'clients');
        
    }

    protected function setupListOperation()
    {
        $field1=['label' => "nom",
        'type' => 'text',
        'name' => 'nom', ];
        $field2=['label' => "prenom",
        'type' => 'text',
        'name' => 'prenom', ];
        $field3=['label' => "adresse",
        'type' => 'text',
        'name' => 'adresse', ];
        $field4=['label' => "email",
        'type' => 'text',
        'name' => 'email', ];
        $field5=[
            'label'=>'image',
            'type' => 'image',
            'name' => 'imgPath',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => '80px',
        ];
        $this->crud->addColumns([$field5,$field1,$field2,$field3,$field4]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);

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

        $field1=['label' => "nom",
        'type' => 'text',
        'name' => 'nom', ];
        $field2=['label' => "prenom",
        'type' => 'text',
        'name' => 'prenom', ];
        $field3=['label' => "adresse",
        'type' => 'text',
        'name' => 'adresse', ];
        $field4=['label' => "email",
        'type' => 'text',
        'name' => 'email', ];
        $field5=[
            'label'=>'image',
            'type' => 'image',
            'name' => 'imgPath',
            'prefix' => 'storage/',
            'height' => '100px',
            'width' => '100px',
        ];
        $this->crud->addColumns([$field5,$field1,$field2,$field3,$field4]);
    }
}
