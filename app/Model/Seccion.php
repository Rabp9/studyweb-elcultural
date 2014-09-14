<!-- File: /app/Model/Seccion.php -->

<?php
    class Seccion extends AppModel {
        public $useTable = "Secciones";
        public $primaryKey = "idSeccion";
       
        public $belongsTo = array(
            "Grado" => array(
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
