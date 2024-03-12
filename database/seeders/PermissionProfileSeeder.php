<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Profile;
use App\Models\PermissionProfile;

class PermissionProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'company-list',
            'company-create',
            'company-update',
            'company-delete',

            'list-company-user',
            'list-equipment-user',
            'create-company-user',
            'edit-company-user',
            'create-equipment-user',
            'edit-equipment-user',
            'delete-equipment-user',
            'delete-company-user',
        ];

        $profiles = [
            [
                'name' => 'Super Admin',
                'description' => 'Este é o nível mais alto no sistema, com permissões para criar novas empresas'
            ],
            [
                'name' => 'Admin',
                'description' => 'Este é o nível mais alto na hierarquia, com acesso completo e controle sobre o sistema'
            ],
            [
                'name' => 'Moderators',
                'description' => 'Esses usuários têm um conjunto de permissões menos abrangente em comparação com o administrador, mas ainda possuem controle significativo'
            ],
            [
                'name' => 'Default',
                'description' => 'Podem interagir com o sistema, mas não têm controle sobre configurações ou funções administrativas'
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        foreach ($profiles as $profileData) {
            Profile::create([
                'name' => $profileData['name'],
                'description' => $profileData['description']
            ]);
        }

        $permissionsLimits = [
            'Super Admin' => [1, 4],
            'Admin' => [5, 12],
            'Moderators' => [5, 10],
            'Default' => [5, 6],
        ];

        foreach ($profiles as $index => $profile) {
            $profileName = $profile['name'];
            $permissionLimit = $permissionsLimits[$profileName];

            for ($key = $permissionLimit[0]; $key <= $permissionLimit[1]; $key++) {
                PermissionProfile::create([
                    'profile_id' => $index + 1,
                    'permission_id' => $key
                ]);
            }
        }
    }
}
