<!-- File: /app/Model/Articulo.php -->

<?php
    class Articulo extends AppModel {
        public $primaryKey = "idArticulo";
        
        public $validate = array(
            "foto" => array(
                "rule" => array(
                    "extension", array('jpeg', 'jpg')
                ),
                "message" => "Selecciona una imagen."
            )
        );
    }
?>
