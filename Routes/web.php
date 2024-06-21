<?php
use Controllers\OfficesController;
use Helpers\Routes;


Routes::get("offices", OfficesController::class, "index");
Routes::get("offices",OfficesController::class,"report");
Routes::get("offices/delete/{id}",OfficesController::class,"deleteOffices");
