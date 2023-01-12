<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJuridicalPersonRequest;
use App\Http\Requests\UpdateJuridicalPersonRequest;
use App\Models\JuridicalPerson;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;

class JuridicalPersonController extends Controller
{
    public function create()
    {
        return Inertia::render('Person/JuridicalPerson/Create', [
            'data' => [
                'typeChoices'    => JuridicalPerson::TYPE_SELECT,
                'sizeChoices'    => JuridicalPerson::SIZE_SELECT,
                'statusChoices'  => JuridicalPerson::STATUS_SELECT,
            ],
        ]);
    }

    /**
     * temporary. Just for debugging.
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * this is the actual store() function
     */
    public function SKIP_store(StoreJuridicalPersonRequest $request): RedirectResponse
    {
        $juridicalPerson = JuridicalPerson::create($request->all());

        return redirect()->route('persons.index');
    }
}
