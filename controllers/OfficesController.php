<?php
namespace Controllers;
use Config\Config;
use Helpers\PdfGenerator;
use Helpers\View;
use Model\Offices;
    class OfficesController {
        private $officesModel;
        public function __construct() {
            $config = Config::getInstance();
            $pdo = $config->getConnection();
            $this->officesModel = new Offices($pdo);
        }
        public function principal(){
            View::view("index"); 
        }
        public function index(){
            $offices = $this->officesModel->index();
            View::view("offices.offices",["offices"=>$offices]);
        }
        public function create(){
            $office = $this->officesModel;
            View::view("offices.create",["office"=>$office]);
        }
        public function delete(){
            $id = $_GET["id"];
            $this->officesModel->delete($id);
            header("Location:index.php?page=office&action=index");
        }
        public function report(){
    
            // Incluir el archivo que genera el HTML
            $reporte = $this->officesModel->index();
            PdfGenerator::generateFromView("offices.reporte",["reporte"=>$reporte]);
        }
    }


?>