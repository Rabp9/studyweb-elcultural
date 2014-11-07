<!-- File: /app/Model/Horario.php -->

<?php
    class Horario extends AppModel {
        public $primaryKey = "idHorario";
        
        public $belongsTo = array(
            "Curso" => array(
                "foreignKey" => "idCurso"
            ),
            "Aula" => array(
                "foreignKey" => "idAula"
            ),
            "Docente" => array(
                "foreignKey" => "idDocente"
            ),
            "Seccion" => array(
                "foreignKey" => "idSeccion"
            )
        );
    }
?>
