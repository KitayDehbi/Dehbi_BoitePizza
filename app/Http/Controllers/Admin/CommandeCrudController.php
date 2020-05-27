<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommandeRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommandeCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommandeCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commande');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commande');
        $this->crud->setEntityNameStrings('commande', 'commandes');
        $this->crud->addField([ 
            'label' => "client",
            'type' => 'select2',
            'name' => 'client_id', 
            'entity' => 'client', 
            'attribute' => 'nom',' prenom', 
            'model' => "App\Models\Client"
        ]);
        $this->crud->addField([ 
            'label' => "produits",
            'type' => 'select2_multiple',
            'name' => 'produits', 
            'entity' => 'produits', 
            'attribute' => 'name', 
            'model' => "App\Models\Produit",
            'pivot' => true
        ]);
        
        $this->crud->addField([ 
            'label' => "formules",
            'type' => 'select2_multiple',
            'name' => 'formules', 
            'entity' => 'formules', 
            'attribute' => 'nom', 
            'model' => "App\Models\Formule",
            'pivot' => true
        ]);
        $this->crud->addField([ 
            'label' => "Supplements",
            'type' => 'select2_multiple',
            'name' => 'supplements', 
            'entity' => 'supplements', 
            'attribute' => 'name', 
            'model' => "App\Models\Supplement",
            'pivot' => true
        ]);
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        
        $this->crud->addColumn(['label' => "Client",
        'type' => 'text',
        'name' => 'Client.nom' ]);
        $this->crud->addColumn([ 
            'label' => "numero",
            'type' => 'text',
            'name' => 'id', 
        ]);
        $this->crud->setFromDb();
        

        
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommandeRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    protected function setupShowOperation(){
        $field=[
        'label' => "Client",
        'type' => 'text',
        'name' => 'Client.nom' ];
        $field1=[ 
            'label' => "produits",
            'type' => 'select_multiple',
            'name' => 'produits', 
            'entity' => 'produits', 
            'attribute' => 'name', 
            'model' => "App\Models\Produit",
           
        ];
        $field2=[ 
            'label' => "Quantites",
            'type' => 'select_multiple',
            'name' => 'produitsQte', 
            'entity' => 'produitsQte', 
            'attribute' => 'pivot.quantite', 
            'model' => "App\Models\Produit",
            'pivot'=> true,
        ];
        $field3=[ 
            'label' => "Quantites",
            'type' => 'select_multiple',
            'name' => 'formulesQte', 
            'entity' => 'formulesQte', 
            'attribute' => 'pivot.quantite', 
            'model' => "App\Models\Formule",
            'pivot'=> true,
            'pivotFields' => [
                'quantite' => 'quantite',
            ],
            
        ];
        $field4=[ 
            'label' => "formules",
            'type' => 'select_multiple',
            'name' => 'formules', 
            'entity' => 'formules', 
            'attribute' => 'nom', 
            'model' => "App\Models\Formule",

            
        ];
        $field5=[ 
            'label' => "Supplements",
            'type' => 'select_multiple',
            'name' => 'supplements', 
            'entity' => 'supplements', 
            'attribute' => 'name', 
            'model' => "App\Models\Supplement",

            
        ];
        $field6=[ 
            'label' => "Quantites",
            'type' => 'select_multiple',
            'name' => 'supplementsQte', 
            'entity' => 'supplementsQte', 
            'attribute' => 'pivot.quantite', 
            'model' => "App\Models\Supplement",
            'pivot'=> true,
        ];
        $this->crud->addColumns([$field,$field1,$field2,$field4,$field3,$field5,$field6 ]);
    }
    
}
