<?php
use core\Route;

# authentification routes
Route::add("/login", function() { view('auth.login'); });
Route::add("/register", function() { view('auth.register'); });
Route::add("/reset", function() { view('auth.reset'); });