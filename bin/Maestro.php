<?php
class Maestro
{
    protected $value;
    protected $option;
    protected $command;

    public $color_red = "\033[31m";
    public $color_blue = "\033[34m";
    public $color_green = "\033[32m";
    public $color_yellow = "\033[33m";
    public $color_reset = "\033[0m";

    public function __construct()
    {
        $this->parseArguments();
    }

    protected function parseArguments()
    {
        // Skip the script name (usually the first argument)
        $arguments = array_slice($_SERVER['argv'], 1);

        $this->value = $arguments[1] ?? null;

        if (count($arguments) >= 1) {
            $arguments = explode(':', $arguments[0]);

            $this->command = $arguments[0];
            $this->option = $arguments[1] ?? null;
        } else {
            $this->showHelp();
            exit(1);
        }
    }


    # application key handler: generate, show, etc.
    public function key()
    {
        // Implement the logic for the "key" command
        switch ($this->option) {
            case 'show': $this->showKey(); break;
            case 'generate': $this->generateKey(); break;
            default: $this->helpKey(); break;
        }
    }

    protected function generateKey()
    {
        // generate a new key with random bytes
        $key = "hash32:".bin2hex(random_bytes(32));
        updateConfig('app_key', $key);

        echo "Your new application key is: \n\t".$this->color_green.$key.$this->color_reset."\n";
    }

    protected function showKey()
    {
        // show the application key
        $key = config('app_key');
        echo "Your application key is: \n\t".$this->color_green.$key.$this->color_reset."\n";
    }

    protected function helpKey()
    {
        view(
            $this->color_blue . "Maestro - Key Guideline" . $this->color_reset,
            "Usage:",
            "   key:help",
            "   key:show",
            "   key:generate"
        );
    }


    # controllers management
    public function controller()
    {
        // Implement the logic for the "controller" command
        switch ($this->option) {
            case 'list': $this->listClasses(getcwd().'/app/controllers'); break;
            case 'create': $this->createController(); break;
            case 'delete': $this->deleteController(); break;
            default: $this->helpController(); break;
        }
    }

    protected function listClasses($dir)
    {
        preload($dir);
        // Get an array of all declared classes
        $classes = get_declared_classes();


        // Specify the desired file path prefix
        $filePathPrefix = $dir;

        // Output the classes and their locations that match the prefix
        foreach ($classes as $class) {
            $reflection = new ReflectionClass($class);
            $filePath = $reflection->getFileName();

            // Check if the file path starts with the specified prefix
            if (strpos($filePath, $filePathPrefix) === 0) {
                echo 'Class: ' . $this->color_blue . $class . $this->color_reset . PHP_EOL . 'Location: ' . $filePath . PHP_EOL;
            }
        }
    }

    protected function createController()
    {

        // create a new controller
        $path = 'app/controllers';
        $allPath = $this->value;
        $allPath = explode('/', $allPath);

        // remove the last item
        $controller = end($allPath);
        array_pop($allPath);

        foreach ($allPath as $item) {
            $path = $path.'/'.$item;
            if (!file_exists($path)) {
                mkdir($path);
            }
        }

        
        $controller = ucfirst($controller);
        $controller = $controller.'Controller';

        $controllerData = "<?php\n\nclass $controller\n{\n\t// your nonsense goes in here 😂\n}";

        $file = $path.'/'.$controller.'.php';

        if (!file_exists($file)) {
            file_put_contents($file, $controllerData);
            echo "Controller created successfully.\n";
        } else {
            echo "Controller already exists.\n";
        }

    }

    protected function deleteController(){
        // delete a controller
        $controller = $this->value;
        $controller = ucfirst($controller);

        // do a fileSearch
        $file = fileSearch("$controller.php", 'app/controllers') ?? fileSearch($controller."Controller.php", 'app/controllers');

        if ($file) {
            if(unlink($file)) view("Controller deleted successfully.");
        } else {
            echo "Controller does not exist.\n";
        }

    }

    protected function helpController()
    {
        view(
            $this->color_blue . "Maestro - Controller Guideline" . $this->color_reset,
            "Usage:",
            "   controller:help",
            "   controller:list",
            "   controller:create <name>",
            "   controller:delete <name>"
        );
    }


    # models management
    public function model()
    {
        // Implement the logic for the "model" command
        switch ($this->option) {
            case 'list': $this->listClasses(getcwd().'/app/models'); break;
            case 'create': $this->createModel(); break;
            case 'delete': $this->deleteModel(); break;
            default: $this->helpModel(); break;
        }
    }

    protected function createModel()
    {
        // create a new model
        $path = 'app/models';
        $allPath = $this->value;
        $allPath = explode('/', $allPath);

        // remove the last item
        $model = end($allPath);
        array_pop($allPath);

        foreach ($allPath as $item) {
            $path = $path.'/'.$item;
            if (!file_exists($path)) {
                mkdir($path);
            }
        }

        
        $model = ucfirst($model);
        $model = $model.'Model';

        $modelData = "<?php\n\nclass $model\n{\n\t// your nonsense goes in here 😂\n}";

        $file = $path.'/'.$model.'.php';

        if (!file_exists($file)) {
            file_put_contents($file, $modelData);
            view("Model created successfully.");
        } else {
            view("Model already exists.");
        }

    }

    protected function deleteModel(){
        // delete a model
        $model = $this->value;
        $model = ucfirst($model);

        // perform a fileSearch
        $file = fileSearch("$model.php", 'app/models') ?? fileSearch($model."Model.php", 'app/models');

        if ($file) {
            if(unlink($file)) view("Model deleted successfully.");
        } else {
            view("Model does not exist.");
        }
    }

    protected function helpModel()
    {
        view(
            $this->color_blue . "Maestro - Model Guideline" . $this->color_reset,
            "Usage:",
            "   model:help",
            "   model:list",
            "   model:create <name>",
            "   model:delete <name>"
        );
    }


    # show help message
    protected function showHelp()
    {
    
        view(
            $this->color_blue . "Maestro - The DyF command-line tool" . $this->color_reset,
            "Usage:",
            "  php maestro command:option",
            "  php maestro serve".PHP_EOL
        );

        $this->helpKey();
        $this->helpModel();
        $this->helpController();

    }


    # initialize the project
    protected function init()
    {
        // check if .env file exists, if not duplicate .env.example
        if (!file_exists('.env')) {
            copy('.env.example', '.env');

            view(
                $this->color_blue . "Maestro - Init:" . $this->color_reset,
                "Initializing your project..."
            );
        }

        $this->key();        

    }


    # serve the project
    protected function serve()
    {
        // serve the project
        $host = config('app_host') ?? 'localhost';
        $port = config('app_port') ?? 8000;

        view(
            $this->color_blue . "Maestro - Serve:" . $this->color_reset,
            "Serving your project at: ".$this->color_green."http://$host:$port".$this->color_reset
        );

        shell_exec("php -S $host:$port");
    }


    # run the command
    public function run()
    {
        switch ($this->command) {
            case 'key': $this->key(); break;
            case 'init': $this->init(); break;
            case 'serve': $this->serve(); break;
            case 'model': $this->model(); break;
            case 'controller': $this->controller(); break;
            default:
                $this->showHelp();
                break;
        }
    }
}