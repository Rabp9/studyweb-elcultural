<!-- File: /app/Model/Alumno.php -->

<?php
    class Alumno extends AppModel {
        public $primaryKey = "idAlumno";
          
        public $belongsTo = array(
            "User" => array(
                "foreignKey" => "idUser"
            )
        );
        
        public $hasOne = array(
            "Matricula" => array(
                "foreignKey" => "idAlumno",
                "conditions" => array("Matricula.estado" => 1)
            )
        );
        
        public $validate = array(
            "nombres" => array(
                "rule" => "notEmpty"
            ),
            "apellidoPaterno" => array(
                "rule" => "notEmpty"
            ),
            "apellidoMaterno" => array(
                "rule" => "notEmpty"
            )
        );
        
        public function getIdAlumno() {
            $cantidad = $this->query("SELECT count(*) 'cantidad' FROM Alumnos");
            $cantidad = $cantidad[0][0]["cantidad"];
            return parent::getCodigo(6, $cantidad + 1, "A");
        }
        
    }
?>
