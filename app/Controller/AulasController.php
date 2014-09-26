<!-- File: /app/Controller/AulasController.php -->

<?php
    class AulasController extends AppController {
        public function index() {
            $this->layout = "admin";
            $this->set("aulas", $this->Aula->find("all", array(
                'conditions' => array('Aula.estado' => '1')
            )));
        }
              
        public function view($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Aula inválida"));
            }
            $aula = $this->Aula->findByIdaula($id);
            if (!$aula) {
                throw new NotFoundException(__("Aula inválida"));
            } 
            $this->set("aula", $aula);
        }
        
        public function add() {
            $this->layout = "admin";
            
            if ($this->request->is("post")) {
                $this->Aula->create();
                $this->Aula->set("idAula", $this->Aula->getIdAula($this->request->data["Aula"]["piso"]));
                if ($this->Aula->save($this->request->data)) {
                    $this->Session->setFlash(__("El aula ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el aula."), "flash_bootstrap");
            }
        }
         
        public function edit($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Aula inválida"));
            }
            $aula = $this->Aula->findByIdaula($id);
            if (!$aula) {
                throw new NotFoundException(__("Aula inválida"));
            }
            if ($this->request->is(array("post", "put"))) {
                $this->Aula->id = $id;
                if ($this->Aula->save($this->request->data)) {
                    $this->Session->setFlash(__("El aula ha sido actualizada."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No es posible actualizar el aula."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $aula;
            }
        }     
        
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Aula->id = $id;
            if ($this->Aula->saveField("estado", 2)) {
                $this->Session->setFlash(__("El aula de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
}