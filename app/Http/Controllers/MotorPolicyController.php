<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\Policy;

class MotorPolicyController extends Controller
{
    public function create()
    {
        return Inertia::render('Policy/Motor/Create', [
            'data' => [
                
            ],
            'meta' => [

            ],
        ]);
    }
}
