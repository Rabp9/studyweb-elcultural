<!-- File: /app/Controller/MensajesController.php -->

<?php
    class MensajesController extends AppController {
        public $uses = array("Alumno", "Curso");   
        
        public function index() {    
            $this->layout = "alumno";
            
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
            
            $this->Alumno->id = $alumno["Alumno"]["idAlumno"];
            $alumno = $this->Alumno->read();
            
            $this->Alumno->Matricula->id = $alumno["Matricula"]["idMatricula"];
            $matricula = $this->Alumno->Matricula->read();
            
            $this->Alumno->Matricula->Seccion->id = $matricula["Seccion"]["idSeccion"];
            $seccion = $this->Alumno->Matricula->Seccion->read();
            
            $this->Alumno->Matricula->Seccion->Grado->id = $seccion["Grado"]["idGrado"];
            $grado = $this->Alumno->Matricula->Seccion->Grado->read();
            
            $cursos = $this->Curso->find("list", array(
                "fields" => array("Curso.idCurso", "Curso.descripcion"),
                "conditions" => array(
                    "Curso.idGrado" => $grado["Grado"]["idGrado"]
                )
            ));
            $this->set("cursos", $cursos);
        }
              
        public function registrar() {
            $this->layout = "alumno";
        }
}