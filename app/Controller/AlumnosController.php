<!-- File: /app/Controller/AlumnosController.php -->

<?php
    class AlumnosController extends AppController {
        public $uses = array("Alumno", "User");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getAlumnos", "datos");
        }

        public function index() {
            $this->layout = "admin";
            $this->set("alumnos", $this->Alumno->find("all", array(
                'conditions' => array('Alumno.estado' => '1')
            )));
        }
              
        public function view($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Alumno inválido"));
            }
            $alumno = $this->Alumno->findByIdalumno($id);
            if (!$alumno) {
                throw new NotFoundException(__("Alumno inválido"));
            } 
            $this->set("alumno", $alumno);
        }
        
        public function add() {
            $this->layout = "admin";
            
            if ($this->request->is("post")) {
                $ds = $this->Alumno->getDataSource();
                $ds->begin();
                
                $this->request->data["Alumno"]["idAlumno"] = $this->Alumno->getIdAlumno();
                $this->request->data["User"]["idUser"] = $this->Alumno->User->getIdUser();
                $this->request->data["Alumno"]["idUser"] = $this->Alumno->User->getIdUser();
                
                if ($this->Alumno->User->save($this->request->data)) {
                    if($this->Alumno->save($this->request->data)) {
                        $ds->commit();
                        $this->Session->setFlash(__("El alumno ha sido registrado correctamente."), "flash_bootstrap");
                        return $this->redirect(array('action' => 'index'));
                    }
                }
            }
        }
         
        public function edit($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Alumno inválido"));
            }
            $alumno = $this->Alumno->findByIdalumno($id);
            if (!$alumno) {
                throw new NotFoundException(__("Alumno inválido"));
            }
            if ($this->request->is(array("post", "put"))) {  
                
                $ds = $this->Alumno->getDataSource();
                $ds->begin();
             
                $this->Alumno->User->id = $alumno["User"]["idUser"];
                $this->Alumno->id = $id;
                if ($this->Alumno->User->save($this->request->data)) {
                    if($this->Alumno->save($this->request->data)) {
                        $ds->commit();
                        $this->Session->setFlash(__("El alumno ha sido actualizado."), "flash_bootstrap");
                        return $this->redirect(array("action" => "index"));
                    }
                }
                $this->Session->setFlash(__("No es posible actualizar el alumno."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $alumno;
            }
        }     
        
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Alumno->id = $id;
            if ($this->Alumno->saveField("estado", 2)) {
                $this->Session->setFlash(__("El alumno de código: %s ha sido eliminado.", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
        
        public function getAlumnos() {
            $this->layout = "ajax";
            
            if(isset($this->request->data["busqueda"])) {
                $busqueda = $this->request->data["busqueda"];
                $this->set("alumnos", $this->Alumno->find("all", array(
                    "conditions" => array(
                        "OR" => array(
                            "Alumno.nombres LIKE" => "%" . $busqueda . "%",
                            "Alumno.apellidoPaterno LIKE" => "%" . $busqueda . "%",
                            "Alumno.apellidoMaterno LIKE" => "%" . $busqueda . "%"
                        )
                    )
                )));
            }
            else
                $this->set("alumnos", $this->Alumno->find("all"));
            $this->render();
        }
        
        public function datos() {
            if(empty($this->request->params["requested"])) {
                throw new ForbiddenException();
            }
            
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
            
            $this->Alumno->Matricula->id = $alumno["Matricula"]["idMatricula"];
            $matricula = $this->Alumno->Matricula->read();
            
            $this->Alumno->Matricula->Seccion->id = $matricula["Matricula"]["idSeccion"];
            $seccion = $this->Alumno->Matricula->Seccion->read();
            
            $alumno["Alumno"]["grado_seccion"] = $seccion["Grado"]["descripcion_general"] . " \"" . $seccion["Seccion"]["descripcion"] ."\"";
            return $alumno;
        }
}