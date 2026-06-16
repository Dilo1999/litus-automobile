<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            ['name' => 'view_catalog', 'group' => 'Catalog', 'description' => 'View products and brands'],
            ['name' => 'edit_catalog', 'group' => 'Catalog', 'description' => 'Create and edit products and brands'],
            ['name' => 'view_posts', 'group' => 'Content', 'description' => 'View posts'],
            ['name' => 'edit_posts', 'group' => 'Content', 'description' => 'Create and edit posts'],
            ['name' => 'view_users', 'group' => 'Settings', 'description' => 'View users list'],
            ['name' => 'edit_users', 'group' => 'Settings', 'description' => 'Create and edit users'],
            ['name' => 'view_roles', 'group' => 'Settings', 'description' => 'View roles and permissions'],
            ['name' => 'edit_roles', 'group' => 'Settings', 'description' => 'Create and edit roles and assign permissions'],
            ['name' => 'manage_permissions', 'group' => 'Settings', 'description' => 'Manage permission definitions'],
            ['name' => 'manage_system_settings', 'group' => 'System Settings', 'description' => 'Manage system settings (favicon, SEO, etc.)'],
        ];

        foreach ($permissions as $p) {
            Permission::updateOrCreate(['name' => $p['name']], $p);
        }

        $admin = Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'Full access to all features']
        );
        $admin->permissions()->sync(Permission::pluck('id'));

        $editor = Role::firstOrCreate(
            ['name' => 'editor'],
            ['description' => 'Can manage catalog and content']
        );
        $editor->permissions()->sync(
            Permission::whereIn('name', ['view_catalog', 'edit_catalog', 'view_posts', 'edit_posts'])->pluck('id')
        );

        $viewer = Role::firstOrCreate(
            ['name' => 'viewer'],
            ['description' => 'Read-only access to catalog and content']
        );
        $viewer->permissions()->sync(
            Permission::whereIn('name', ['view_catalog', 'view_posts'])->pluck('id')
        );
    }
}
