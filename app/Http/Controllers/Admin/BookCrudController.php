<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BookRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class BookCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BookCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \App\Traits\CrudPermissionTrait;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Book::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/book');
        CRUD::setEntityNameStrings('book', 'books');
        $this->setAccessUsingPermissions();
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::group( //لإضافة لاحقة لأحد الأعمدة
            CRUD::column('price'),
        )->prefix('$');
        // $this->crud->enableBulkActions();
        CRUD::column('cover_image')->type('image');
        CRUD::column('authors');
        CRUD::column('publishers');
        CRUD::column('categories');

        CRUD::removeColumn(['slug']);
        CRUD::removeColumn(['description']);
        CRUD::removeColumn(['release_date']);


        /**
         * Columns can be defined using the fluent syntax:
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
        CRUD::setValidation(BookRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::field('authors')->type('select_multiple');
        CRUD::field('publishers')->type('select_multiple');
        CRUD::field('categories')->type('select_multiple');

        CRUD::field('title')->type('text');
        CRUD::field('cover_image')->type('upload');
        CRUD::field([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'select_from_array',
            'options' => [
                'DRAFT' => 'Draft',
                'PUBLISHED' => 'Published'
            ]
        ]);

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
