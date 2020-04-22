<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
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
        $field1=['label' => "Name",
        'type' => 'text',
        'name' => 'nom', ];
        $field2=['label' => "Prix",
        'type' => 'double',
        'name' => 'prix', ];
        $field3=['label' => "Description",
        'type' => 'text',
        'name' => 'description', ];
        $field4=[
            'label'=>'image',
            'type' => 'image',
            'name' => 'imgPath',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => '80px',
        ];
        $this->crud->addColumns([$field4,$field1,$field2,$field3]);
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FormuleRequest::class);

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
        $field1=['label' => "Name",
        'type' => 'text',
        'name' => 'nom', ];
        $field2=['label' => "Prix",
        'type' => 'double',
        'name' => 'prix', ];
        $field3=['label' => "Description",
        'type' => 'text',
        'name' => 'description', ];
        $field4=[
            'label'=>'image',
            'type' => 'image',
            'name' => 'imgPath',
            'prefix' => 'storage/',
            'height' => '80px',
            'width' => '80px',
        ];
        $this->crud->addColumns([$field4,$field1,$field2,$field3]);
    }
}
