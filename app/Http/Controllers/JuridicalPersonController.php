<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJuridicalPersonRequest;
use App\Http\Requests\UpdateJuridicalPersonRequest;
use App\Models\Person;
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

    public function store(StoreJuridicalPersonRequest $request): RedirectResponse
    {
        $person = Person::create([
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'type' => Person::TYPE_JURIDICAL
        ]);

        JuridicalPerson::create([
            'person_id' => $person->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'size' => $request->input('size'),
            'founded' => $request->input('founded'),
            'status' => $request->input('status'),
            'website' => $request->input('website'),
        ]);

        return redirect()->route('persons.index');
    }
}
