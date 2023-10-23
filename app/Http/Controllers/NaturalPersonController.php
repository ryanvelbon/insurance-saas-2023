<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNaturalPersonRequest;
// use App\Http\Requests\UpdateNaturalPersonRequest;
use App\Models\Person;
use App\Models\NaturalPerson;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;

class NaturalPersonController extends Controller
{
    public function create()
    {
        $this->authorize('person.create');

        return Inertia::render('Person/NaturalPerson/Create', [
            'data' => [
                'genderChoices' => NaturalPerson::GENDER_SELECT,
                'maritalStatusChoices' => NaturalPerson::MARITAL_STATUS_SELECT,
            ],
        ]);
    }

    public function store(StoreNaturalPersonRequest $request): RedirectResponse
    {
        $person = Person::create([
            'type' => Person::TYPE_NATURAL,
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'domicile_country_id' => $request->input('domicile'),
        ]);

        NaturalPerson::create([
            'person_id' => $person->id,
            'passport_no' => $request->input('passportNo'),
            'first_name' => $request->input('firstName'),
            'last_name' => $request->input('lastName'),
            'nationality' => $request->input('nationality'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'marital_status' => $request->input('maritalStatus'),
        ]);

        return redirect()->route('persons.index')
            ->with('success', 'New Person record has been created.');
    }
}
