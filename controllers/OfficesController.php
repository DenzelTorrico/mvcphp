<?php
    require_once("../model/Offices.php");
    class OfficesController {
        private $officesModel;
        public function __construct($pdo) {
                $this->officesModel = new Offices($pdo);
        }
        public function principal(){
            require_once("../views/index.php"); 
        }
        public function index(){
            $offices = $this->officesModel->index();
            require_once("../views/offices/offices.php");
        }
        public function create(){
            $office = $this->officesModel;
            require_once("../views/offices/create.php");
        }
        public function delete(){
            $id = $_GET["id"];
            $this->officesModel->delete($id);
            header("Location:index.php?page=office&action=index");
        }
        public function report(){
    
            // Incluir el archivo que genera el HTML
            $reporte = $this->officesModel->index();
            $path = "../views/offices/reporte.php";
            PdfGenerator::generateFromView($path,["reporte"=>$reporte]);
        }
    }


?>