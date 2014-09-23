<!-- File: /app/Model/Grupo.php -->

<?php

    App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

    class Grupo extends AppModel {
        public $primaryKey = "idGrupo";
       
        public $validate = array(
            'descripcion' => array(
                'required' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'A gruponame is required'
                )
            )
        );
        
    }
?>
