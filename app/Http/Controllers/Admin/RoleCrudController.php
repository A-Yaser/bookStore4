<?php

namespace App\Http\Controllers\Admin;


use Backpack\PermissionManager\app\Http\Controllers\RoleCrudController as BackpackRoleCrudController;


/**
 * Class RoleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RoleCrudController extends BackpackRoleCrudController
{
    use \App\Traits\CrudPermissionTrait;
    private array $operations = ['list', 'show', 'create', 'update', 'delete'];
    public function setup()
    {
        parent::setup();
        $this->setAccessUsingPermissions($this->operations);
    }
}
