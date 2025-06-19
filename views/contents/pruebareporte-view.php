<?php
define('actionsRequired', true); // Ajusta esto según tu estructura

require_once './core/mainModel.php';
require_once './models/reporteModel.php';

$model = new reporteModel();

echo "<pre>";
print_r($model->total_participantes_model());
print_r($model->participantes_genero_model());
print_r($model->nivel_estudios_genero_model());
print_r($model->provincia_genero_model());
print_r($model->actividad_economica_genero_model());
print_r($model->etnia_genero_model());
echo "</pre>";