<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\Policy;

class TravelPolicyController extends Controller
{
    public function create()
    {
        return Inertia::render('Policy/Travel/Create', [
            'data' => [
                
            ],
            'meta' => [

            ],
        ]);
    }
}
