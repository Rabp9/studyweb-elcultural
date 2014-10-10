<!-- File: /app/Model/Periodo.php -->

<?php
    class Periodo extends AppModel {
        public $primaryKey = "idPeriodo";
         
        public $validate = array(
            "descripcion" => array(
                "rule" => "notEmpty"
            )
        );

        public function getIdPeriodo() {
            $cantidad = $this->query("SELECT count(*) 'cantidad' FROM Periodos");
            $cantidad = $cantidad[0][0]["cantidad"];
            return parent::getCodigo(3, $cantidad + 1, "P");
        }
    }
?>
