<?php
namespace Helpers;

class Routes
{
    private static $COUNT_METHOD_GET = 0;
    private static $URLS = [];
    public static function get($url, $class, $action)
    {
        array_push(self::$URLS, [$url, $class]);
        $request = trim($_SERVER['REQUEST_URI'], '/');
        // Eliminar la parte inicial de la URL que no nos interesa
        $request = str_replace('php/bikestores/', '', $request);

        // Dividir la URL en partes
        $urlComponents = explode('/', $request);
        // Asignar los parámetros de la URL a variables
        $page = isset($urlComponents[1]) ? $urlComponents[1] : 'index';
        $action = isset($urlComponents[2]) ? $urlComponents[2] : 'index';
        if (!str_contains($action,"report")) require_once("../layout/header.php");
        $controller = new $class;
        foreach (self::$URLS as $url_available) {
            if ($url_available[0] == $page) {
                if (method_exists($controller, $action)) {
                    call_user_func([$controller, $action]);

                } else {
                    throw new \Exception("El método $action no existe en la clase " . get_class($controller));
                }
            }else{
                echo "esta pagina no existe";
            }
        }
        if (!str_contains($action,"report")) require_once("../layout/footer.php");

    }
    public static function getURLS()
    {
        return self::$URLS;
    }
}

