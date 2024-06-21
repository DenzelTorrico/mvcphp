<?php

namespace Console;

use Exception;

function makeController($arguments)
{
    if (!isset($arguments[0])) {
        echo "Please provide a name for the controller.\n";
        return;
    }

    $controllerName = ucfirst($arguments[0]) . 'Controller';
    $filePath = "Controllers/{$controllerName}.php";

    if (file_exists($filePath)) {
        echo "Controller already exists!\n";
        return;
    }

    $controllerTemplate = <<<PHP
<?php

namespace Controllers;

class {$controllerName}
{
    public function index()
    {
        // Default method
    }
}
PHP;

    try {
        file_put_contents($filePath, $controllerTemplate);
        echo "Controller created successfully.\n";
    } catch (Exception $e) {
        echo "Error creating controller: " . $e->getMessage() . "\n";
    }
}

function makeModel($arguments)
{
    if (!isset($arguments[0])) {
        echo "Please provide a name for the model.\n";
        return;
    }

    $modelName = ucfirst($arguments[0]);
    $filePath = "Model/{$modelName}.php";

    if (file_exists($filePath)) {
        echo "Model already exists!\n";
        return;
    }

    $modelTemplate = <<<PHP
<?php

namespace Model;

use Config\Model;

class {$modelName} extends Model
{
    protected \$table = strtolower('{$modelName}');
}
PHP;

    try {
        file_put_contents($filePath, $modelTemplate);
        echo "Model created successfully.\n";
    } catch (Exception $e) {
        echo "Error creating model: " . $e->getMessage() . "\n";
    }
}
