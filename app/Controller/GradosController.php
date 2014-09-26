<!-- File: /app/Controller/GradosController.php -->

<?php
    class GradosController extends AppController {              
        public function index() {
            $this->layout = "admin";
            $this->set("grados", $this->Grado->find("all", array(
                'conditions' => array('Grado.estado' => '1')
            )));
        }
        
        public function view($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Grado inválido"));
            }
            $grado = $this->Grado->findByIdgrado($id);
            if (!$grado) {
                throw new NotFoundException(__("Grado inválido"));
            } 
            $this->set("grado", $grado);
        }
                
        public function add() {
            $this->layout = "admin";
            
            if ($this->request->is("post")) {
                $this->Grado->create();
                if ($this->Grado->save($this->request->data)) {
                    $this->Session->setFlash(__("El grado ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el grado."), "flash_bootstrap");
            }
        }
        
        public function edit($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Grado inválido"));
            }
            $grado = $this->Grado->findByIdgrado($id);
            if (!$grado) {
                throw new NotFoundException(__("Grado inválido"));
            }
            if ($this->request->is(array("post", "put"))) {
                $this->Grado->id = $id;
                if ($this->Grado->save($this->request->data)) {
                    $this->Session->setFlash(__("El grado ha sido actualizado."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No es posible actualizar el grado."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $grado;
            }
        }
           
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Grado->id = $id;
            if ($this->Grado->saveField("estado", 2)) {
                $this->Session->setFlash(__("El grado de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
}