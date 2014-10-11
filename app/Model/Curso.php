<!-- File: /app/Model/Curso.php -->

<?php
    class Curso extends AppModel {
        public $primaryKey = "idCurso";
     
        public $belongsTo = array(
            "Grado" => array(
                "foreignKey" => "idGrado"
            )
        );
        
        public $hasMany = array(
            "Horario" => array(
                "foreignKey" => "idCurso"
            )
        );

        public $validate = array(
            "descripcion" => array(
                "rule" => "notEmpty"
            )
        );
        
        public function getIdCurso() {
            $cantidad = $this->query("SELECT count(*) 'cantidad' FROM Cursos");
            $cantidad = $cantidad[0][0]["cantidad"];
            return parent::getCodigo(4, $cantidad + 1, "C");
        }
        
    }
?>
