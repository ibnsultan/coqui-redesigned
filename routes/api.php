<?php 
use core\Route;

Route::add("/api", function() {
    return json_encode([
        "status" => "success",
        "message" => "Welcome to the Dynamic Framework API v1.0.0"
    ]);
});

Route::post("/api/tts", function() { load('cAudio')->tts($_POST['string']); });