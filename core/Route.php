<?php

namespace core;

class Route {

	private static $routes = Array();
	private static $pathNotFound = null;
	private static $methodNotAllowed = null;	
	private static $userNotAllowed = null;
	private static $customCorsHeaders = [];

	/**
		* Function used to add a new route
		* @param string $expression    Route string or expression
		* @param callable $function    Function to call if route with allowed method is found
		* @param string|array $method  Either a string of allowed method or an array with string values
		*
	*/
	public static function add($expression, $function, $method = 'get', $role=null){

		// if method is not option but came in as option die
		if($method != 'options' and strtolower($_SERVER['REQUEST_METHOD']) == 'options'):
			die();
		elseif(is_array($method)):
			if(!in_array('options', $method) and strtolower($_SERVER['REQUEST_METHOD']) == 'options') die();
		endif;

		array_push(self::$routes, Array(
			'expression' => $expression,
			'function' => $function,
			'method' => $method,
			'role' => $role
		));
	}

	public static function get($expression, $function, $role = null) {
        self::add($expression, $function, 'GET', $role);
    }

    public static function post($expression, $function, $role = null) {
        self::add($expression, $function, 'POST', $role);
    }

    public static function put($expression, $function, $role = null) {
        self::add($expression, $function, 'PUT', $role);
    }

    public static function delete($expression, $function, $role = null) {
        self::add($expression, $function, 'DELETE', $role);
    }

    public static function options($expression, $function, $role = null) {
        self::add($expression, $function, 'OPTIONS', $role);
    }

    public static function any($expression, $function, $role = null) {
        self::add($expression, $function, ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'], $role);
    }

	public static function getAll(){
		return self::$routes;
	}

	public static function pathNotFound($function) {
		self::$pathNotFound = $function;
	}

	public static function methodNotAllowed($function) {
		self::$methodNotAllowed = $function;
	}

	public static function userNotAllowed($function){
		self::$userNotAllowed = $function;
	}

	public static function checkRole($role){
		if(is_array($role)){
			if(in_array($_SESSION['role'], $role)) {
				return true;
			}
		}else{
			if($_SESSION['role'] == $role) {
				return true;
			}
		}
	}

	public static function setCustomCorsHeaders(array $headers) {
        self::$customCorsHeaders = $headers;
    }

    private static function setCorsHeaders() {
        header("Access-Control-Allow-Origin: http://localhost");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
        header("Access-Control-Max-Age: 86400"); // 24 hours cache
    }

	public static function run($basepath = '', $case_matters = false, $trailing_slash_matters = false, $multimatch = false) {

		self::setCorsHeaders();

		// The basepath never needs a trailing slash
		// Because the trailing slash will be added using the route expressions
		$basepath = rtrim($basepath, '/');

		// Parse current URL
		$parsed_url = parse_url($_SERVER['REQUEST_URI']);

		$path = '/';

		// If there is a path available
		if (isset($parsed_url['path'])) {
			// If the trailing slash matters
			if ($trailing_slash_matters) {
				$path = $parsed_url['path'];
			} else {
				// If the path is not equal to the base path (including a trailing slash)
				if($basepath.'/'!=$parsed_url['path']) {
					// Cut the trailing slash away because it does not matters
					$path = rtrim($parsed_url['path'], '/');
				} else {
					$path = $parsed_url['path'];
				}
			}
		}

		$path = urldecode($path);

		// Get current request method
		$method = $_SERVER['REQUEST_METHOD'];

		$path_match_found = false;

		$route_match_found = false;

		foreach (self::$routes as $route) {

			// If the method matches check the path

			// Add basepath to matching string
			if ($basepath != '' && $basepath != '/') {
				$route['expression'] = '('.$basepath.')'.$route['expression'];
			}

			// Add 'find string start' automatically
			$route['expression'] = '^'.$route['expression'];

			// Add 'find string end' automatically
			$route['expression'] = $route['expression'].'$';

			// Check path match
			if (preg_match('#'.$route['expression'].'#'.($case_matters ? '' : 'i').'u', $path, $matches)) {
				
				// check if user is allowed to access the route
				if(isset($route['role'])){
					if(!self::checkRole($route['role'])){
						$route_match_found = true;
						// call the not allowed function
						if (self::$userNotAllowed) {
							call_user_func_array(self::$userNotAllowed, Array($path, $method));
						}
						break;
					}
				}
				
				$path_match_found = true;

				// Cast allowed method to array if it's not one already, then run through all methods
				foreach ((array)$route['method'] as $allowedMethod) {
						// Check method match
					if (strtolower($method) == strtolower($allowedMethod)) {
						array_shift($matches); // Always remove first element. This contains the whole string

						if ($basepath != '' && $basepath != '/') {
							array_shift($matches); // Remove basepath
						}

						if($return_value = call_user_func_array($route['function'], $matches)) {
							echo $return_value;
						}

						$route_match_found = true;

						// Do not check other routes
						break;
					}
				}
			}

			// Break the loop if the first found route is a match
			if($route_match_found&&!$multimatch) {
				break;
			}

		}

		// No matching route was found
		if (!$route_match_found) {
			// But a matching path exists
			if ($path_match_found) {
				if (self::$methodNotAllowed) {
					call_user_func_array(self::$methodNotAllowed, Array($path,$method));
				}
			} else {
				if (self::$pathNotFound) {
					call_user_func_array(self::$pathNotFound, Array($path));
				}
			}

		}
	}

}
