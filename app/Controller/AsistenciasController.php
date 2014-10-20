<!-- File: /app/Controller/AsistenciasController.php -->

<?php
    class AsistenciasController extends AppController {
        public $uses = array("User", "Alumno", "Asistencia");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getAsistenciasByCurso");
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
        
        public function getAsistenciasByCurso() {
            $this->layout = "ajax";
            
            $idCurso = $this->request->data['idCurso'];
            
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
     
            $this->Alumno->Matricula->id = $alumno["Matricula"]["idMatricula"];
            $matricula = $this->Alumno->Matricula->read();
           
            $this->set("asistencias", $this->Asistencia->find("all", array(
                "conditions" => array(
                    "Asistencia.idMatricula" => $matricula["Matricula"]["idMatricula"],
                    "Asistencia.idCurso" => $idCurso
                )
            )));
        }
        
        public function registrar() {
            $this->layout = "docente";
        }
    }
?>