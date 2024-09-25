<?php

use App\Http\Controllers\Relationship;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('relationship')->group(function() {
    Route::get('avatar', [Relationship::class, 'avatar']); //One - One

    // Route::get('posts', [RelationshipController::class, 'posts']);
    // Route::get('category', [RelationshipController::class, 'category']);
    // Route::get('category-attach', [RelationshipController::class, 'categoryAttach']);
    // Route::get('category-detach', [RelationshipController::class, 'categoryDetach']);
    // Route::get('category-sync', [RelationshipController::class, 'categorySync']);
    // Route::get('category-pivot', [RelationshipController::class, 'categoryPivot']);

    // // P2
    // Route::get('category-post', [RelationshipController::class, 'categoryPost']);

    // // P3
    // Route::get('poly-one-one', [RelationshipController::class, 'polyOneOne']);
    // Route::get('poly-one-many', [RelationshipController::class, 'polyOneMany']);
    // Route::get('poly-one-create', [RelationshipController::class, 'polyOneCreate']);

    // Route::get('poly-many-create', [RelationshipController::class, 'polyManyCreate']);
    // Route::get('poly-many-many', [RelationshipController::class, 'polyManyMany']);

    // // P4
    // Route::get('all-post', [RelationshipController::class, 'allPost']);

    // // P5
    // Route::get('condition-relationship', [RelationshipController::class, 'conditionRelationship']);
});
