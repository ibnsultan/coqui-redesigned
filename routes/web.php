<?php 
use core\Route;

Route::get("/", function() { load('cPublic')->home(); });

Route::get("/about", function() { load('cPublic')->about(); });
Route::get("/contact", function() { load('cPublic')->contact(); });

Route::get("/blog", function() { load('cPublic')->blog(); });

Route::get("/tts", function() { load('cAudio')->tts('Hello there!'); });