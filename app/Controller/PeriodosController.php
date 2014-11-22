<!-- File: /app/Controller/PeriodosController.php -->

<?php
    App::uses('CakeTime', 'Utility');
        
    class PeriodosController extends AppController {
        public function beforeFilter() {
            parent::beforeFilter();
        }

        public function index() {
            $this->layout = "admin";
            $this->set("periodos", $this->Periodo->find("all", array(
                "conditions" => array("Periodo.estado" => "1")
            )));
        }
        
        public function view($id = null) {
        }
                
        public function add() {
            $this->layout = "admin";      
        
            if ($this->request->is("post")) {
                $this->Periodo->create();
                $this->request->data["Periodo"]["idPeriodo"] = $this->Periodo->getIdPeriodo();
                if ($this->Periodo->saveAssociated($this->request->data)) {
                    mkdir(WWW_ROOT . DS . "files" . DS . "drive" . DS . $this->Periodo->id ." - " . $this->request->data["Periodo"]["descripcion"]);
                    $this->Session->setFlash(__("El periodo ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el periodo."), "flash_bootstrap");
            }
        }
        
        public function edit($id = null) {
        }
           
        public function delete($id) {
        }
        
        public function getDias() {
            $this->Periodo->id = $this->request->data['Periodo']['idPeriodo'];

            $this->set("periodo", $this->Periodo->read());
            
            $this->layout = 'ajax';
        }
}