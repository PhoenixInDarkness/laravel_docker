<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\SocialController;

Route::get('/auth/google/redirect', [SocialController::class, 'googleRedirect']);

Route::get('/auth/google/callback', [SocialController::class, 'googleCallBack']);
