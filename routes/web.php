<?php

use App\Http\Controllers\AllergyController;

Route::get('/', [AllergyController::class, 'index']);
Route::resource('allergies', AllergyController::class);