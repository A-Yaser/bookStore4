<?php

namespace App\Http\Controllers\Admin;

use Backpack\PermissionManager\app\Http\Controllers\UserCrudController as BackpackUserCrudController;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends BackpackUserCrudController
{
    use \App\Traits\CrudPermissionTrait;
    // private array $operations = ['list', 'show', 'create', 'update', 'delete'];
    public function setup()
    {
        parent::setup();
        $this->setAccessUsingPermissions(['list', 'show', 'create', 'update', 'delete']); //العمليات التي سيتم منعها بشكل تلقائي
    }
}
