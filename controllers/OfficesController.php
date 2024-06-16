<?php
use Dompdf\Dompdf;

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
            $dompdf = new Dompdf();
            
            // Iniciar el almacenamiento en búfer de salida
            ob_start();
            
            // Incluir el archivo que genera el HTML
            $reporte = $this->officesModel->index();
            include("../views/offices/reporte.php");
            
            // Obtener el contenido del búfer y limpiarlo
            $html = ob_get_clean();
            
            // Cargar el HTML en Dompdf
            $dompdf->loadHtml($html);
            
            // Renderizar el HTML como PDF
            $dompdf->render();
            
            // Enviar el PDF al navegador
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=Reporte_Oficinas.pdf");
            echo $dompdf->output();
            
            // Detener el script aquí para asegurarte de que no se ejecute código adicional
            exit(0);
        }
    }


?>