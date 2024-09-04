<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Backpack\PermissionManager\app\Models\Permission;
use Backpack\PermissionManager\app\Models\Role;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database Permission seed.

     * Permissions are fixed in code and are seeded here.
     * use 'php artisan db:seed --class=PermissionSeeder --force' in production
     *
     * @return void
     */
    public function run()
    {

        $tables = [
            'users',
            'roles',
            'books',
            'authors',
            'Publishers',
            'categories',
        ];

        // create permission for each combination of table.level
        collect($tables)
            ->crossJoin([
                'list',
                'show',
                'create',
                'update',
                'delete'
            ])
            ->each(
                fn(array $item) => Permission::firstOrCreate([
                    'name' => implode('.', $item),
                ])
                    ->save()
            )
            //
        ;
        $user = User::firstOrCreate(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                // 'password' => Hash::make('admin1122'),

            ]
        );
        $user->password = bcrypt('admin1122');
        $user->save();
        $role = Role::firstOrCreate([
            'name' => 'admin'
        ]);
        $role->givePermissionTo(Permission::all());

        $user->assignRole($role);
    }
}
