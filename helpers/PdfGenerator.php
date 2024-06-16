<?php
namespace Helpers;
use Dompdf\Dompdf;

class PdfGenerator {
    protected static function PathView($name){
        $path = str_replace(".","/",$name);
        $url = "../views/".$path.".php";
        return $url;
    }
    public static function generateFromView($viewPath, $data = [], $outputFilename = 'documento.pdf', $inline = true) {
        // Extraer variables del array $data para que puedan ser usadas en el archivo de vista
        extract($data);

        // Iniciar el almacenamiento en búfer de salida
        ob_start();
        
        // Incluir el archivo de vista
        include(self::PathView($viewPath));
        
        // Obtener el contenido del búfer y limpiarlo
        $html = ob_get_clean();
        
        // Crear una instancia de Dompdf
        $dompdf = new Dompdf();
        
        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);
        
        // Renderizar el HTML como PDF
        $dompdf->render();
        
        // Configurar las cabeceras para la salida del PDF
        header("Content-type: application/pdf");
        header("Content-Disposition: " . ($inline ? "inline" : "attachment") . "; filename=$outputFilename");
        
        // Enviar el contenido del PDF al navegador
        echo $dompdf->output();
        
        // Detener el script para asegurarte de que no se ejecute código adicional
        exit(0);
    }
   
}
?>
