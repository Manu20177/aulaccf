<?php
if ($actionsRequired) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}

class reporteModel extends mainModel {

    /*----------  Total de participantes  ----------*/
    public function total_participantes_model() {
        $query = self::connect()->prepare("SELECT COUNT(*) AS total FROM cuenta WHERE Privilegio = 4");
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC); // Devuelve directamente el valor
    }

    /*----------  Participantes por género  ----------*/
    public function participantes_genero_model() {
        $query = self::connect()->prepare("
            SELECT c.Genero, COUNT(*) AS total 
            FROM cuenta c 
            WHERE c.Privilegio = 4 
            GROUP BY c.Genero
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC); // Devuelve todas las filas
    }

    /*----------  Nivel educativo por género  ----------*/
    public function nivel_estudios_genero_model() {
        $query = self::connect()->prepare("
            SELECT e.Nivel, c.Genero, COUNT(*) AS total 
            FROM estudiante e 
            JOIN cuenta c ON e.Codigo = c.Codigo 
            GROUP BY e.Nivel, c.Genero
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /*----------  Provincia por género  ----------*/
    public function provincia_genero_model() {
        $query = self::connect()->prepare("
            SELECT e.Provincia, c.Genero, COUNT(*) AS total 
            FROM estudiante e 
            JOIN cuenta c ON e.Codigo = c.Codigo 
            GROUP BY e.Provincia, c.Genero
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /*----------  Actividad económica por género  ----------*/
    public function actividad_economica_genero_model() {
        $query = self::connect()->prepare("
            SELECT e.Actividad, c.Genero, COUNT(*) AS total 
            FROM estudiante e 
            JOIN cuenta c ON e.Codigo = c.Codigo 
            GROUP BY e.Actividad, c.Genero
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /*----------  Grupo étnico por género  ----------*/
    public function etnia_genero_model() {
        $query = self::connect()->prepare("
            SELECT e.Etnia, c.Genero, COUNT(*) AS total 
            FROM estudiante e 
            JOIN cuenta c ON e.Codigo = c.Codigo 
            GROUP BY e.Etnia, c.Genero
        ");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}