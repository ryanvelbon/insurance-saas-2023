<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InsuranceCategory;
use App\Models\Policy;

class PolicyController extends Controller
{
    public function index()
    {
        $categories = InsuranceCategory::all();
        $policies = Policy::all();

        return Inertia::render('Policy/Index', [
            'data' => [
                'categories' => $categories,
                'policies' => $policies,
            ],
            'meta' => [

            ],
        ]);
    }

    public function create($category)
    {
        return Inertia::render('Policy/Create', [
            'data' => [
                'selectedCategory' => $category
            ],
            'meta' => [

            ],
        ]);
    }
}
