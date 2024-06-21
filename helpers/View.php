<?php
namespace Helpers;
        class View {

            public static function view($name,$data = []){
                $path = str_replace(".","/",$name);
                $folder = "../views/".$path.".php";
                extract($data);
                require_once($folder);
        }
        public static function redirectTo($path){
            header('Location: '.trim($_SERVER['REQUEST_URI'],"/")."/".$path);
        }
    
    }


