<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class JuridicalPersonController extends Controller
{
    public function create()
    {
        return Inertia::render('Person/JuridicalPerson/Create', [
            'data' => [

            ],
        ]);
    }
}
