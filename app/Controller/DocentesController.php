<!-- File: /app/Controller/DocentesController.php -->

<?php
    class DocentesController extends AppController {
        public function index() {
            $this->layout = "admin";
            $this->set("docentes", $this->Docente->find("all", array(
                'conditions' => array('Docente.estado' => '1')
            )));
        }
              
        public function view($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Docente inválido"));
            }
            $docente = $this->Docente->findByIddocente($id);
            if (!$docente) {
                throw new NotFoundException(__("Docente inválido"));
            } 
            $this->set("docente", $docente);
        }
        
        public function add() {
            $this->layout = "admin";
            
            if ($this->request->is("post")) {
                $this->Docente->create();
                $this->Docente->set("idDocente", $this->Docente->getIdDocente());
                if ($this->Docente->save($this->request->data)) {
                    $this->Session->setFlash(__("El docente ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el docente."), "flash_bootstrap");
            }
        }
         
        public function edit($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Docente inválido"));
            }
            $docente = $this->Docente->findByIddocente($id);
            if (!$docente) {
                throw new NotFoundException(__("Docente inválido"));
            }
            if ($this->request->is(array("post", "put"))) {
                $this->Docente->id = $id;
                if ($this->Docente->save($this->request->data)) {
                    $this->Session->setFlash(__("El docente ha sido actualizado."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No es posible actualizar el docente."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $docente;
            }
        }     
        
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Docente->id = $id;
            if ($this->Docente->saveField("estado", 2)) {
                $this->Session->setFlash(__("El docente de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
}