<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;
// use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPersonRequest;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $this->authorize('person.access');

        $persons = Person::all();

        return Inertia::render('Person/Index', [
            'data' => [
                'persons' => $persons
            ],
            'meta' => [

            ],
        ]);

        return view('persons.index', compact('persons'));
    }

    public function create()
    {
        $this->authorize('person.create');

        return Inertia::render('Person/Create', [
            'data' => [

            ],
        ]);
    }

    public function edit(Person $person)
    {
        $this->authorize('person.edit');

        return view('persons.edit', compact('person'));
    }

    public function show(Person $person)
    {
        $this->authorize('person.view');

        return Inertia::render('Person/Show', [
            'data' => [
                'person' => $person,
            ]
        ]);

    }

    public function destroy(Person $person)
    {
        $this->authorize('person.delete');

        $person->delete();

        return back();
    }

    public function massDestroy(MassDestroyPersonRequest $request)
    {
        Person::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}