<?php

use Nette\Utils\Html;
Use eftec\bladeone\BladeOne;
use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;
use Nette\Mail\SendmailMailer;

function db($action = 'conn'){
	switch ($action):
		case 'conn': return load('DB')->conn(); break;
		case 'explore': return load('DB')->explore(); break;
		default: return load('DB')->conn(); break;
	endswitch;
}

# classes loader
function preload($directory): void {
	if(is_dir($directory)) :
		$scan = scandir($directory);
		unset($scan[0], $scan[1]); # unset . and ..

		# foreach scaned directory recall the function
		foreach($scan as $file):
			if(is_dir($directory."/".$file)):
				preload($directory."/".$file);
			else:
				if(strpos($file, '.php') !== false):
					require_once($directory."/".$file);
				endif;
			endif;
		endforeach;
	endif;
}

function email($status = 'send'){

	if($status == 'send'):
		$engine = config('mail_driver');

		switch($engine):
			case 'smtp': return new SmtpMailer(
				host: config('mail_host'),
				username: config('mail_user'),
				password: config('mail_pass'),
				encryption: config('mail_auth'),
			); break;
			case 'mailer': return new SendmailMailer(); break;
			default: return new SmtpMailer(
					host: config('mail_host'),
					username: config('mail_user'),
					password: config('mail_pass'),
					encryption: config('mail_auth'),
			); break;
		endswitch;
	else:
		return new Message();
	endif;
}

# config function
function config($key){
	$key = strtoupper($key);
	return $_ENV[$key] ?? null;
}

function updateConfig($key, $value)
{
    $envFile = '.env';
	$value = strtoupper($value);

    // Read the existing content
    $currentContent = file_get_contents($envFile);

    // Replace the old value with the new one
    $newContent = preg_replace("/$key=.*/", "$key=$value", $currentContent);

    // Write the updated content back to the file
    file_put_contents($envFile, $newContent);
}

# HTML render and view template engine
function render(){ return new Html(); }

function view(){
	$views = views . '/';
	$cache = cache . '/views';
	$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

	// define global variables
	// $blade->setBaseUrl(config('base_url'));
	
	$args = func_get_args();
	$view = $args[0];
	$data = $args[1] ?? [];

	echo $blade->run($view, $data);
}

/***************************************
 * Language and localization functions *
 **************************************/

# language and localization function
function __($key){
	$lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'].'.json' : 'en.json';
	$term = file_get_contents(locale . '/' . $lang);
	$term = json_decode($term, true);

	return $term[$key] ?? $key;
}

// this function is used by the ___() function
function spin($foo, $bar){	
	if(isset($_SESSION['id'])): return $bar;
		else: return $foo;
	endif;
}

// return output depending on the user's login status
function ___($foo, $bar){
	$key = spin($foo, $bar);
	return __($key);
}

// content iterator function for localization
function __e($key, $el){
	# el sample : li, h1, h2, h3, h4, h5, h6, p, span, a, div, etc
	# key sample : "feature_list" : [  "ብቃት ያላቸው አስተማሪዎች",  "ነጻ እና መስተጋብራዊ ትምህርት",  "AI-Powered ግምገማ" ]

	$key = __($key); $res = '';
	foreach ($key as $value)  $res .= "<$el>$value</$el>";
	
	return $res;
}

/*******************************************
 * End Language and localization functions *
 ******************************************/

# http error handler
function _error($type){
	switch ($type):
		case '404': header('HTTP/1.0 404 Not Found'); view("errors.404"); break;
		case '405': header('HTTP/1.0 405 Method Not Allowed'); view("errors.405"); break;
		case '403': header('HTTP/1.0 403 Forbidden'); view("errors.403"); break;
		default: header('HTTP/1.0 404 Not Found'); view("errors.404");
	endswitch;
}

# class loader
function load($class){
	# check if the class exists
	if(class_exists($class)):
		# create a new instance of the class
		$object = new $class();
		# return the object
		return $object;
	else:
		# if the class does not exist return false
		return _error('404');
	endif;
}

function redirect($path){
	header("Location: $path");
}

?>