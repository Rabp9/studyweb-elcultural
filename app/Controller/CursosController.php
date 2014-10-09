<!-- File: /app/Controller/CursosController.php -->

<?php
    class CursosController extends AppController {
        public function index() {
            $this->layout = "admin";
            $this->set("cursos", $this->Curso->find("all", array(
                'conditions' => array('Curso.estado' => '1')
            )));
        }
        
        public function view($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Curso inválido"));
            }
            $curso = $this->Curso->findByIdcurso($id);
            if (!$curso) {
                throw new NotFoundException(__("Curso inválido"));
            } 
            $this->set("curso", $curso);
        }
        
        public function add() {
            $this->layout = "admin";
            $this->set("grados", $this->Curso->Grado->find("list", array(
                "fields" => array("Grado.idGrado", "Grado.descripcion_general"),
                'conditions' => array('Grado.estado' => '1')
            )));
         
            if ($this->request->is("post")) {
                $this->Curso->create();
                $this->request->data["Curso"]["idCurso"] = $this->Curso->getIdCurso();
                if ($this->Curso->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__("El curso ha sido registrada correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el curso."), "flash_bootstrap");
            }
        }
        
        public function edit($id = null) {
            $this->layout = "admin";
            $this->set("grados", $this->Curso->Grado->find("list", array(
                "fields" => array("Grado.idGrado", "Grado.descripcion_general"),
                'conditions' => array('Grado.estado' => '1')
            )));
            
            if (!$id) {
                throw new NotFoundException(__("Curso inválido"));
            }
            $curso = $this->Curso->findByIdcurso($id);
            if (!$curso) {
                throw new NotFoundException(__("Curso inválido"));
            }
            if ($this->request->is(array("post", "put"))) {
                $this->Curso->id = $id;
                if ($this->Curso->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__("El curso ha sido actualizada."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No es posible actualizar el curso."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $curso;
            }
        }
        
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Curso->id = $id;
            if ($this->Curso->saveField("estado", 2)) {
                $this->Session->setFlash(__("El curso de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
}