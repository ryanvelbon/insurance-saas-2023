<?php

use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PersonController;
use App\Http\Controllers\NaturalPersonController;
use App\Http\Controllers\JuridicalPersonController;

use App\Http\Controllers\PolicyController;
use App\Http\Controllers\MotorPolicyController;
use App\Http\Controllers\TravelPolicyController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Teams
Route::get('/team-members', [TeamMemberController::class, 'index'])->name('team-members.index');
Route::post('/team-members', [TeamMemberController::class, 'invite'])->name('team-members.invite');

// Persons
Route::resource('/persons', PersonController::class);

// Persons (Natural)
Route::get('/natural-persons/create', [NaturalPersonController::class, 'create'])->name('naturalPersons.create');
Route::post('/natural-persons', [NaturalPersonController::class, 'store'])->name('naturalPersons.store');

// Persons (Juridical)
Route::get('/juridical-persons/create', [JuridicalPersonController::class, 'create'])->name('juridicalPersons.create');
Route::post('/juridical-persons', [JuridicalPersonController::class, 'store'])->name('juridicalPersons.store');


// Policies
Route::get('/policies', [PolicyController::class, 'index'])->name('policies.index');
Route::get('/policies/create/{category}', [PolicyController::class, 'create'])->name('policies.create');
