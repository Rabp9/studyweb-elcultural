<!-- File: /app/Model/Docente.php -->

<?php
    class Docente extends AppModel {
        public $primaryKey = "idDocente";
        
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
        
        public function getIdDocente() {
            $cantidad = $this->query("SELECT count(*) 'cantidad' FROM Docentes");
            $cantidad = $cantidad[0][0]["cantidad"];
            return parent::getCodigo(4, $cantidad + 1, "D");
        }
        
    }
?>
