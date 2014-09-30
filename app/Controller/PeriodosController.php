<!-- File: /app/Controller/PeriodosController.php -->

<?php
    class PeriodosController extends AppController {              
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
                    while ($fechaInicio != $fechaFin) {
                        $data = array(
                            "idPeriodo" => $this->Periodo->id,
                            "inicio" => $fechaInicio,
                            "fin" => $fechaFin
                        );
                        $this->Periodo->Clase->saveAssociated($data);
                        // Aumentar un día a $fechaInicio
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
}