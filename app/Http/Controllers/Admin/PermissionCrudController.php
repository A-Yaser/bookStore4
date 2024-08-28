<?php

namespace App\Http\Controllers\Admin;

use Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController as BackpackPermissionsCrudControlleruse;

/**
 * Class PermissionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PermissionCrudController extends BackpackPermissionsCrudControlleruse
{
    use \App\Traits\CrudPermissionTrait;
    // private array $operations = ['list', 'show', 'create', 'update', 'delete'];
    public function setup()
    {
        parent::setup();
        $this->setAccessUsingPermissions(['list', 'show', 'create', 'update', 'delete']);
    }
}
