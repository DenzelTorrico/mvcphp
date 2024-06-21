<?php
namespace Controllers;
use Config\Config;
use Helpers\PdfGenerator;
use Helpers\View;
use Model\Offices;
    class OfficesController {
        private $officesModel;
     
        public function principal(){
            View::view("index"); 
        }
        public function index()
        {
            $offices = Offices::all();
            View::view("offices.offices", ["offices" => $offices]);
        }

        public function deleteOffices($id){
            Offices::delete($id);
            View::redirectTo("index");
        }
    
        public function report(){
    
            // Incluir el archivo que genera el HTML
            $reporte = $this->officesModel->index();
            PdfGenerator::generateFromView("offices.reporte",["reporte"=>$reporte]);
        }
    }


?>