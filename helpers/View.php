<?php

        class View {

            public static function view($name){
                $path = str_replace(".","/",$name);
                $folder = "../views/".$path.".php";
                require_once($folder);
            }
        }


