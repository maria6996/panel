<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Product::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product');
        CRUD::setEntityNameStrings('product', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
//        CRUD::setFromDb(); // set columns from db columns.
        $this->crud->setColumns(['fa_name','en_name','model','count','shortDescription','fullDescription' ]);
        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductRequest::class);
//        CRUD::setFromDb(); // set fields from db columns.


        $this->crud->addField([
            'name' => 'fa_name',
            'type' => 'text',
            'label' => "Product name"
        ]);

        $this->crud->addField([
            'name' => 'en_name',
            'type' => 'text',
            'label' => "en Product name"
        ]);
        $this->crud->addField([
            'name' => 'model',
            'type' => 'text',
            'label' => "model"
        ]);
        $this->crud->addField([
            'name' => 'count',
            'type' => 'text',
            'label' => "count"
        ]);
        $this->crud->addField([
            'name' => 'shortDescription',
            'type' => 'textarea',
            'attributes' => [
                'id' => 'editor',
                'class' => 'form-control some-class'
            ], // extra HTML
//            'custom_build' => [
//                resource_path('assets/ckeditor/ckeditor.js'),
//                resource_path('assets/ckeditor/ckeditor-init.js'),
//            ],
        ]);

//        $this->crud->addField([
//            'name' => 'fullDescription',
//            'type' => 'ckeditor',
//            'label' => "full Description ",
//            'custom_build' => [
//                resource_path('assets/ckeditor/ckeditor.js'),
//                resource_path('assets/ckeditor/ckeditor-init.js'),
//            ],
//        ]);

//        $this->crud->addField([
//            'name' => 'description',
//            'type' => 'text',
//            'label' => "description"
//        ]);
        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
