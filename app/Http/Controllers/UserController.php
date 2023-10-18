<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\TeamShowResource;
use App\Http\Resources\UserResource;
use App\Models\Team;
use App\Models\User;
use Gate;
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
        abort_if(Gate::denies('team_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

    public function invite(Request $request)
    {
        $request->validate(['email' => 'email']);
        $team    = Team::where('owner_id', auth()->user()->id)->first();
        $url     = URL::signedRoute('register', ['team' => $team->id]);
        $message = new \App\Notifications\UserInvite($url);
        Notification::route('mail', $request->input('email'))->notify($message);

        return redirect()->back()->with('message', 'Invite sent.');
    }
}