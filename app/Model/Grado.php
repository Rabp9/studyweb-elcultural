<!-- File: /app/Model/Grado.php -->

<?php
    class Grado extends AppModel {
        public $primaryKey = "idGrado";
        
        public $virtualFields = array(
            'descripcion_general' => 'CONCAT(Grado.descripcion, " (", Grado.nivel, ")")'
        );
        
        public $hasMany = array(
            "Seccion" => array(
                "foreignKey" => "idGrado"
            )
        );
        
        public $validate = array(
            "descripcion" => array(
                "rule" => "notEmpty"
            )
        );
    }
?>
