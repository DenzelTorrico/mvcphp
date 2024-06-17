<?php

    namespace Controllers;
    use Helpers\View;
    class UserController {
            public function index(){
                View::view("users.index");
            }
    }
