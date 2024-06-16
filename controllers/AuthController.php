<?php

    class AuthController {
            private $config;
            public function __construct($config){
                $this->config = $config;
            }
            public function loginForm(){
                View::view("auth.login");
            }

    }



