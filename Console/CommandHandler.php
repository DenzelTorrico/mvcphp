<?php 
namespace Console;

class CommandHandler
{
    protected $commands = [];

    public function register($name, $callback)
    {
        $this->commands[$name] = $callback;
    }

    public function handle($argv)
    {
        $command = isset($argv[1]) ? $argv[1] : null;
        $arguments = array_slice($argv, 2);

        if ($command && isset($this->commands[$command])) {
            call_user_func($this->commands[$command], $arguments);
        } else {
            echo "Command not found.\n";
        }
    }
}