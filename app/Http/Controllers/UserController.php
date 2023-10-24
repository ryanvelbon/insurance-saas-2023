<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\TeamShowResource;
use App\Http\Resources\UserResource;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('user.access');

        $id = auth()->user()->team_id;

        $team = Team::findOrFail($id)->load('members');

        return Inertia::render('User/Index', [
            'data' => [
                'team'  => new TeamShowResource($team),
            ],
            'meta' => [

            ],
        ]);
    }

    public function create()
    {
        $this->authorize('user.create');

        return Inertia::render('User/Create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = auth()->user()->team->members()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->roles) {
            $user->roles()->sync($request->roles);
        }

        return Redirect::route('users.index')->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        $this->authorize('user.edit');

        return Inertia::render('User/Edit', [
            'user' => new UserResource($user),
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->only(['name', 'email']));

        $user->roles()->sync($request->roles);

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::back()->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $this->authorize('user.delete');

        $user->delete();

        return Redirect::route('users.index')->with('warning', 'User deleted.');
    }

    public function restore(User $user)
    {
        $this->authorize('user.restore');

        $user->restore();

        return Redirect::back()->with('success', 'User restored.');
    }

    public function invite(Request $request)
    {
        $this->authorize('user.invite');

        $request->validate(['email' => 'email']);
        $team    = Team::where('owner_id', auth()->user()->id)->first();
        $url     = URL::signedRoute('register', ['team' => $team->id]);
        $message = new \App\Notifications\UserInvite($url);
        Notification::route('mail', $request->input('email'))->notify($message);

        return redirect()->back()->with('message', 'Invite sent.');
    }
}