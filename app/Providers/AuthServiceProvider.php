<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $perms = Permission::all();

        foreach ($perms as $perm) {
            Gate::define($perm->title, function ($user) use ($perm) {
                $user_perms = $this->fetch_user_perms();
                return $user_perms->contains('title', $perm->title);
            });
        }
    }

    private function fetch_user_perms()
    {
        // if user was not authenticated , add quest permissions to him

        if (auth()->check()) {
            $roles = auth()->user()->roles;
        } else {
            $roles = Role::firstOrCreate([
                'name' => 'guest'
            ])->get();
        }

        // create empty collection and store all perms of all user roles by merging them

        $perms = collect();

        foreach ($roles as $role) {
            $perms = $perms->merge($role->permissions);
        }

        return $perms;
    }
}
