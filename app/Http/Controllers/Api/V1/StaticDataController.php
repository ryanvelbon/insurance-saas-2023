<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\InsuranceCategory;
use App\Models\Role;
use Illuminate\Http\Request;

class StaticDataController extends Controller
{
    public function index()
    {
        $categories = InsuranceCategory::all();
        $countries = Country::all();
        $roles = Role::all();

        return response()->json([
            'collections' => [
                'categories' => $categories,
                'countries' => $countries,
                'roles' => $roles,
            ],
            'dropdowns' => [
                'categories' => $this->toDropdown($categories, 'title'),
                'countries' => $this->toDropdown($countries, 'nicename'),
                'roles' => $this->toDropdown($roles, 'title'),
            ],
        ]);
    }

    private function toDropdown($collection, $labelField)
    {
        return $collection->map(function ($item) use ($labelField) {
            return [
                'label' => $item->$labelField,
                'value' => $item->id
            ];
        });
    }
}
