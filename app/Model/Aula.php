<!-- File: /app/Model/Aula.php -->

<?php
    class Aula extends AppModel {
        public $primaryKey = "idAula";
        
        public $validate = array(
            "descripcion" => array(
                "rule" => "notEmpty"
            )
        );
        
        public function getIdAula($piso) {
            switch ($piso) {
                case "1ª Piso":
                    $p = 1;
                    break;
                case "2ª Piso":
                    $p = 2;
                    break;
                case "3ª Piso":
                    $p = 3;
                    break;
                case "4ª Piso":
                    $p = 4;
                    break;
            }
            $cantidad = $this->query("SELECT count(*) 'cantidad' FROM Aulas WHERE piso='$piso'");
            $cantidad = $cantidad[0][0]["cantidad"];
            return parent::getCodigo(3, $cantidad + 1, $p);
        }
        
    }
?>
