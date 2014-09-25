<!-- File: /app/Model/User.php -->

<?php

    App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

    class User extends AppModel { 
        public $belongsTo = array(
            "Grupo" => array(
                "foreignKey" => "idGrupo"
            )
        );
        public $primaryKey = "idUser";
        public $actsAs = array('Acl' => array('type' => 'requester', 'enabled' => false));
       
        public $validate = array(
            'username' => array(
                'required' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'A username is required'
                )
            ),
            'password' => array(
                'required' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'A password is required'
                )
            ),
            'rol' => array(
                'valid' => array(
                    'rule' => array('inList', array('admin', 'author')),
                    'message' => 'Please enter a valid role',
                    'allowEmpty' => false
                )   
            )
        );
        
        public function beforeSave($options = array()) {
            if (isset($this->data[$this->alias]['password'])) {
                $passwordHasher = new BlowfishPasswordHasher();
                $this->data[$this->alias]['password'] = $passwordHasher->hash(
                    $this->data[$this->alias]['password']
                );
            }
            return true;
        }
        
        public function getIdUser() {
            $cantidad = $this->query("SELECT count(*) 'cantidad' FROM Users");
            $cantidad = $cantidad[0][0]["cantidad"];
            return parent::getCodigo(4, $cantidad + 1, "U");
        }
        
        public function parentNode() {
            if (!$this->id && empty($this->data)) {
                return null;
            }
            if (isset($this->data["User"]["idGrupo"])) {
                $idGrupo = $this->data["User"]["idGrupo"];
            } else {
                $idGrupo = $this->field("idGrupo");
            }
            if (!$idGrupo) {
                return null;
            } else {
                return array('Grupo' => $idGrupo);
            }
        }
        
        public function bindNode($user) {
            return array('model' => "Grupo", "foreign_key" => $user["User"]["idGrupo"]);
        }
    }
?>
