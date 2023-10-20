<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $actions = [
            'access',
            'viewAny',
            'view',
            'create',
            'edit',
            'delete',
            'restore',
            'forceDelete',
        ];

        $resources = [
            'insurer',
            'person',
            'policy',
            'role',
            'user',
        ];

        collect($resources)
            ->crossJoin($actions)
            ->map(function ($set) {
                return implode('.', $set);
            })->each(function ($permission) {
                Permission::create(['title' => $permission]);
            });

        // define additional permissions below

        $otherPermissions = [
            'profile.editPassword',
            'user.invite',
        ];

        foreach ($otherPermissions as $permission) {
            Permission::create(['title' => $permission]);
        }
    }
}