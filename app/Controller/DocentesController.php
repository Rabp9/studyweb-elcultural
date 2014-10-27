<!-- File: /app/Controller/DocentesController.php -->

<?php
    class DocentesController extends AppController {
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("datos");
        }
        
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
                $ds = $this->Docente->getDataSource();
                $ds->begin();
                
                $this->request->data["Docente"]["idDocente"] = $this->Docente->getIdDocente();
                $this->request->data["User"]["idUser"] = $this->Docente->User->getIdUser();
                $this->request->data["Docente"]["idUser"] = $this->Docente->User->getIdUser();
                if($this->Docente->User->save($this->request->data)) {
                     if($this->Docente->save($this->request->data)) {
                        $ds->commit();
                        $this->Session->setFlash(__("El docente ha sido registrado correctamente."), "flash_bootstrap");
                        return $this->redirect(array("action" => "index"));
                     }  
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
                
                $ds = $this->Docente->getDataSource();
                $ds->begin();
             
                $this->Docente->User->id = $docente["User"]["idUser"];
                $this->Docente->id = $id;
                if ($this->Docente->User->save($this->request->data)) {
                    if($this->Docente->save($this->request->data)) {
                        $ds->commit();
                        $this->Session->setFlash(__("El docente ha sido actualizado."), "flash_bootstrap");
                        return $this->redirect(array("action" => "index"));
                    }
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
        
        public function datos() {
            if(empty($this->request->params["requested"])) {
                throw new ForbiddenException();
            }
            
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
            
            return $docente;
        }
}