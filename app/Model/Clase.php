<!-- File: /app/Model/Clase.php -->

<?php
    class Clase extends AppModel {
        public $primaryKey = "idClase";

        public $belongsTo = array(
            "Periodo" => array(
                "foreignKey" => "idPeriodo"
            )
        );
    }
?>