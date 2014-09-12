<!-- File: /app/Model/Grado.php -->

<?php
    class Grado extends AppModel {
        public $primaryKey = "idGrado";
        
        public $validate = array(
            "descripcion" => array(
                "rule" => "notEmpty"
            )
        );
    }
?>
