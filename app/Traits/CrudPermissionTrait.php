<?php

namespace App\Traits;

use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * CrudPermissionTrait: use Permissions to configure Backpack
 */
trait CrudPermissionTrait
{
    // the operations defined for CRUD controller
    public array $operations = ['list', 'show', 'create', 'update', 'delete'];



    /**
     * set CRUD access using spatie Permissions defined for logged in user
     *
     * @return void
     */
    public function setAccessUsingPermissions()
    {
        // default
        $this->crud->denyAccess($this->operations);


        // get context
        $table = CRUD::getModel()->getTable();
        $user = request()->user();

        // double check if no authenticated user
        if (!$user) {
            return; // allow nothing
        }


        foreach ($this->operations as $operation) {
            if ($user->can("$table.$operation")) {
                $this->crud->allowAccess($operation);
            }
        }
    }
}
