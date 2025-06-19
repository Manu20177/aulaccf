<?php
$actionsRequired=True;
if ($actionsRequired) {
    require_once "../models/reporteModel.php";
} else {
    require_once "./models/reporteModel.php";
}

class reporteController extends reporteModel {

    public function get_datos_reporte() {
        $data['total']     = $this->total_participantes_model();
        $data['genero']    = $this->participantes_genero_model();
        $data['nivel']     = $this->nivel_estudios_genero_model();
        $data['provincia'] = $this->provincia_genero_model();
        $data['actividad'] = $this->actividad_economica_genero_model();
        $data['etnia']     = $this->etnia_genero_model();

        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

// Llamada directa
if (basename($_SERVER['PHP_SELF']) == 'reporteController.php') {
    $controller = new reporteController();
    $controller->get_datos_reporte();
}