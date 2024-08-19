<?php

use App\Http\Controllers\MemberController;

// Define the standard resource routes for API
Route::apiResource('members', MemberController::class);

// Define a custom route for searching members
Route::get('members/search', [MemberController::class, 'search']);
