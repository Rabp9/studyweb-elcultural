<!-- File: /app/Controller/MatriculasController.php -->

<?php
    class MatriculasController extends AppController {
        public $helpers = array('Js');
        public $uses = array("Periodo", "Grado", "Seccion", "Matricula");
        
        public function index() {
            $this->layout = "admin";
            
            $this->set("periodos", $this->Periodo->find("list", array(
                "fields" => array("Periodo.idPeriodo", "Periodo.descripcion"),
                'conditions' => array('Periodo.estado' => '1')
            )));
                 
            $this->set("grados", $this->Grado->find("list", array(
                "fields" => array("Grado.idGrado", "Grado.descripcion_general"),
                'conditions' => array('Grado.estado' => '1')
            )));
            
            if ($this->request->is("post")) {    
                $this->Matricula->create();
                $this->request->data["Matricula"]["fecha"] = date("Y-m-d");
                if ($this->Matricula->save($this->request->data)) {
                    $this->Session->setFlash(__("La matrícula ha sido registrada correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar la matrícula."), "flash_bootstrap");
        
            }
        }      
}