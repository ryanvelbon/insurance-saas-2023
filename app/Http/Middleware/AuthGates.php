<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    /**
     * Handle an incoming HTTP request and dynamically define Laravel Gates based on user roles and permissions from the database.
     *
     * If a user is authenticated, the function defines gates using a combination of roles and their associated permissions.
     * For each permission, a gate is set up to check if the authenticated user's role has that specific permission.
     *
     * @param  \Illuminate\Http\Request $request The incoming HTTP request.
     * @param  \Closure $next The next middleware in the pipeline.
     * @return \Illuminate\Http\Response Returns the response after setting up the gates.
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if (!$user) {
            return $next($request);
        }

        $roles            = Role::with('permissions')->get();
        $permissionsArray = [];

        foreach ($roles as $role) {
            foreach ($role->permissions as $permissions) {
                $permissionsArray[$permissions->title][] = $role->id;
            }
        }

        foreach ($permissionsArray as $title => $roles) {
            Gate::define($title, function ($user) use ($roles) {
                return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
            });
        }

        return $next($request);
    }
}