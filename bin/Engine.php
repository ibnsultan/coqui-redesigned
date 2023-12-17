<?php
include 'core/database.php';

function db($action = 'conn'){
	switch ($action):
		case 'conn': return load('DB')->conn(); break;
		case 'explore': return load('DB')->explore(); break;
		default: return load('DB')->conn(); break;
	endswitch;
}

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

# config function
function config($key){
	$key = strtoupper($key);
	return $_ENV[$key] ?? null;
}

function updateConfig($key, $value)
{
    $envFile = '.env';
    $key = strtoupper($key);

    // Read the existing content
    $currentContent = file_get_contents($envFile);

    // Replace the old value with the new one
    $newContent = preg_replace("/$key=.*/", "$key=$value", $currentContent);

    // Write the updated content back to the file
    file_put_contents($envFile, $newContent);
}

function load($class){
	# check if the class exists
	if(class_exists($class)):
		# create a new instance of the class
		$object = new $class();
		# return the object
		return $object;
	else:
		# if the class does not exist return false
		exit ('the class '.$class.' does not exist');
	endif;
}

function classFinder($directory){

    // Create a DirectoryIterator for the specified directory
    $iterator = new DirectoryIterator($directory);

    // Iterate through the files in the directory
    foreach ($iterator as $fileInfo) {
        // Check if it's a PHP file
        if ($fileInfo->isFile() && $fileInfo->getExtension() === 'php') {
            // Get the file pathname
            $filePath = $fileInfo->getPathname();

            // Include the file to make classes available for reflection
            require_once $filePath;

            // Get the declared classes in the file
            $classes = get_declared_classes();

            // Output the classes and their locations
            foreach ($classes as $class) {
                $reflection = new ReflectionClass($class);
                // Check if the class is defined in the scanned file
                if ($reflection->getFileName() === $filePath) {
                    echo 'Class: ' . $class . ', Location: ' . $reflection->getFileName() . PHP_EOL;
                }
            }
        }
    }
    
}

function view(){
    // echo every argument passed to the function
    $args = func_get_args();
    foreach($args as $arg):
        echo $arg.PHP_EOL;
    endforeach;
}

function fileSearch($file, $dir){
    // recursively search for a file in a directory, return the file path if found else return false
    $dir = realpath($dir);
    $files = scandir($dir);
    foreach($files as $key => $value):
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)):
            if($value == $file):
                return $path;
            endif;
        elseif($value != "." && $value != ".."):
            $result = fileSearch($file, $path);
            if($result):
                return $result;
            endif;
        endif;
    endforeach;
    return null;
}