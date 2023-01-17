<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        $policies = Policy::all();

        return Inertia::render('Policy/Index', [
            'data' => [
                'policies' => $policies
            ],
            'meta' => [

            ],
        ]);
    }
}
