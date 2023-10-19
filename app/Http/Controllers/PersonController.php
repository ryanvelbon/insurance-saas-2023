<?php

namespace App\Http\Controllers;

use Gate;
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
        abort_if(Gate::denies('person.access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('person.create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Inertia::render('Person/Create', [
            'data' => [

            ],
        ]);
    }

    public function edit(Person $person)
    {
        abort_if(Gate::denies('person.edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('persons.edit', compact('person'));
    }

    public function show(Person $person)
    {
        abort_if(Gate::denies('person.view'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return Inertia::render('Person/Show', [
            'data' => [
                'person' => $person,
            ]
        ]);

    }

    public function destroy(Person $person)
    {
        abort_if(Gate::denies('person.delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $person->delete();

        return back();
    }

    public function massDestroy(MassDestroyPersonRequest $request)
    {
        Person::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}