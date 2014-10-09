<!-- File: /app/Controller/PeriodosController.php -->

<?php
    App::uses('CakeTime', 'Utility');
        
    class PeriodosController extends AppController {
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('getDias');
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
                $ds = $this->Periodo->getDataSource();
                $ds->begin();
                $this->Periodo->create();
                $this->request->data["Periodo"]["idPeriodo"] = $this->Periodo->getIdPeriodo();
                if ($this->Periodo->saveAssociated($this->request->data)) {
                    $fechaInicio = $this->request->data["Periodo"]["fechaInicio"];
                    $fechaFin = $this->request->data["Periodo"]["fechaFin"];
                    
                    $fechaInicio = CakeTime::format(
                        'Y-m-d',
                        $fechaInicio["year"] . "-" . $fechaInicio["month"] . "-" . $fechaInicio["day"]
                    );
                    $fechaFin = CakeTime::format(
                        'Y-m-d',
                        $fechaFin["year"] . "-" . $fechaFin["month"] . "-" . $fechaFin["day"]
                    );
                    while ($fechaInicio != $fechaFin) {
                        $data = array(
                            "idPeriodo" => $this->Periodo->id,
                            "inicio" => $fechaInicio,
                            "fin" => $fechaFin
                        );
                        $this->Periodo->Clase->saveAssociated($data); 
                        
                        $fechaInicio = strtotime("+1 day", strtotime($fechaInicio));
                        $fechaInicio = date("Y-m-d", $fechaInicio);
                    }
                    $ds->commit();
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