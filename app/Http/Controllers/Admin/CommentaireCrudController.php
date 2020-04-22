<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentaireRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentaireCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commentaire');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commentaire');
        $this->crud->setEntityNameStrings('commentaire', 'commentaires');
        $this->crud->addField([ 
            'label' => "produit",
            'type' => 'select2_multiple',
            'name' => 'produit_id', 
            'entity' => 'produit', 
            'attribute' => 'name', 
            'model' => "App\Models\Produit"
        ]);
        $this->crud->addField([ 
            'label' => "client",
            'type' => 'select2',
            'name' => 'client_id', 
            'entity' => 'client', 
            'attribute' => 'nom',' prenom', 
            'model' => "App\Models\Client"
        ]);
        $this->crud->addField([ 
            'label' => "date publication",
            'type' => 'date_picker',
            'name' => 'date_pub', 
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format' => 'dd-mm-yyyy',
                'language' => 'fr'
             ],
        ]);
        //$this->crud->setValidation(commentaire::class);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();
        $field1=['label' => "Produit",
        'type' => 'text',
        'name' => 'Produit.name' ];
        $field2=['label' => "Client",
        'type' => 'text',
        'name' => 'Client.nom' ];
        $field3=['label' => "date publication",
        'type' => 'text',
        'name' => 'date_pub' ];
        $field4=['label' => "Corp",
        'type' => 'text',
        'name' => 'texte' ];

        $this->crud->addColumns([$field1,$field2,$field3,$field4]);
        
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommentaireRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    protected function setupShowOperation()
    {$this->crud->set('show.setFromDb', false);
        $field1=['label' => "Produit",
        'type' => 'text',
        'name' => 'Produit.name' ];
        $field2=['label' => "Client",
        'type' => 'text',
        'name' => 'Client.nom' ];
        $field3=['label' => "date publication",
        'type' => 'text',
        'name' => 'date_pub' ];
        $field4=['label' => "Corp",
        'type' => 'text',
        'name' => 'texte' ];

        $this->crud->addColumns([$field1,$field2,$field3,$field4]);
    }
}
