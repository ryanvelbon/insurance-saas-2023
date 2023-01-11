<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class NaturalPersonController extends Controller
{
    public function create()
    {
        return Inertia::render('Person/NaturalPerson/Create', [
            'data' => [

            ],
        ]);
    }
}
