<!-- File: /app/Controller/NotasController.php -->

<?php
    class NotasController extends AppController {
        public $uses = array("User", "Alumno", "Nota");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getNotasByCurso");
        }
        
        public function index() {
            $this->layout = "alumno";
       
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
     
            $this->Alumno->Matricula->id = $alumno["Matricula"]["idMatricula"];
            $matricula = $this->Alumno->Matricula->read();
            
            $this->Alumno->Matricula->Seccion->id = $matricula["Matricula"]["idSeccion"];
            $seccion = $this->Alumno->Matricula->Seccion->read();
            
            $this->Alumno->Matricula->Seccion->Grado->id = $seccion["Seccion"]["idGrado"];
            $grado = $this->Alumno->Matricula->Seccion->Grado->read();
            
            $this->set("cursos", $this->Alumno->Matricula->Seccion->Grado->Curso->find("list", array(
                "fields" => array("Curso.idCurso", "Curso.descripcion"),
                "conditions" => array("Curso.idGrado" => $grado["Grado"]["idGrado"])
            )));
        }      
        
        public function getNotasByCurso() {
            $this->layout = "ajax";
            
            $idCurso = $this->request->data['idCurso'];
            
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
     
            $this->Alumno->Matricula->id = $alumno["Matricula"]["idMatricula"];
            $matricula = $this->Alumno->Matricula->read();
           
            $this->set("notas", $this->Nota->find("all", array(
                "conditions" => array(
                    "Nota.idMatricula" => $matricula["Matricula"]["idMatricula"],
                    "Nota.idCurso" => $idCurso
                )
            )));
        }
        
        public function registrar() {
            $this->layout = "docente";
        }
    }
?>