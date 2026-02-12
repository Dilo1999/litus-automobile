<?php

namespace App\Models\Traits;

use App\Models\Role;

trait HasRoles
{
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user')->withTimestamps();
    }

    public function assignRole(string|Role|array $roles): void
    {
        $roles = is_array($roles) ? $roles : [$roles];
        $roleIds = collect($roles)->map(function ($role) {
            return $role instanceof Role ? $role->id : Role::firstOrCreate(['name' => $role])->id;
        })->toArray();
        $this->roles()->syncWithoutDetaching($roleIds);
    }

    public function syncRoles(array $roles): void
    {
        $roleIds = collect($roles)->map(function ($role) {
            return $role instanceof Role ? $role->id : Role::where('name', $role)->first()?->id;
        })->filter()->toArray();
        $this->roles()->sync($roleIds);
    }

    public function hasRole(string|array $roles): bool
    {
        $roles = is_array($roles) ? $roles : [$roles];
        foreach ($roles as $role) {
            if ($this->roles()->where('name', $role)->exists()) {
                return true;
            }
        }
        return false;
    }

    public function hasPermissionTo(string $permission): bool
    {
        return $this->roles()->whereHas('permissions', function ($q) use ($permission) {
            $q->where('name', $permission);
        })->exists();
    }
}
