<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;

class TeamMemberController extends Controller
{
    public function index()
    {
        $team = Team::findOrFail(auth()->user()->team_id);
        $roles = Role::get(['id', 'title']);

        return Inertia::render('TeamMember/Index', [
            'data' => [
                'team'  => $team,
                'users' => $team->members,
                'roles' => $roles,
            ],
            'meta' => [

            ],
        ]);
    }

    public function invite(Request $request)
    {
        $request->validate(['email' => 'email']);
        $team    = Team::where('owner_id', auth()->user()->id)->first();
        $url     = URL::signedRoute('register', ['team' => $team->id]);
        $message = new \App\Notifications\TeamMemberInvite($url);
        Notification::route('mail', $request->input('email'))->notify($message);

        return redirect()->back()->with('message', 'Invite sent.');
    }
}