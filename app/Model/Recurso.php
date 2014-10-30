<!-- File: /app/Model/Recurso.php -->

<?php
    class Recurso extends AppModel {
        public $primaryKey = "idRecurso";
        
        public $validate = array(
            "descripcion" => array(
                "rule" => "notEmpty"
            )
        );
      
        public $belongsTo = array(
            "Carpeta" => array(
                "foreignKey" => "idCarpeta"
            )
        );
    }
?>
