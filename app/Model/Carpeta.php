<!-- File: /app/Model/Carpeta.php -->

<?php
    class Carpeta extends AppModel {
        public $primaryKey = "idCarpeta";
        
        public $validate = array(
            "descripcion" => array(
                "rule" => "notEmpty"
            )
        );
             
        public $hasMany = array(
            "Recurso" => array(
                "foreignKey" => "idCarpeta"
            )
        ); 
        
        public $belongsTo = array(
            "Curso" => array(
                "foreignKey" => "idCurso"
            )
        );
    }
?>
