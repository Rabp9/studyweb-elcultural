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
            ),
            "Alumno" => array(
                "foreignKey" => "idAlumno"
            )
        );
        
        public $hasMany = array(
            "Asistencia" => array(
                "foreignKey" => "idMatricula"
            )
        );
        
    }
?>
