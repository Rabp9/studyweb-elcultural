<!-- File: /app/Model/Matricula.php -->

<?php
    class Matricula extends AppModel {
        public $primaryKey = "idMatricula";
          
        public $belongsTo = array(
            "Seccion" => array(
                "foreignKey" => "idSeccion"
            ),
            "Periodo" => array(
                "foreignKey" => "idPeriodo"
            )
        );
        
    }
?>
