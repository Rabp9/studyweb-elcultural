<!-- File: /app/Controller/RecursosController.php -->

<?php
    class RecursosController extends AppController {
        public $uses = array("User", "Alumno", "Recurso", "Curso", "Carpeta", "Docente");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getCarpetas", "registrar", "getCarpetasDocente");
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
            
            if($this->request->is("post")) {  
                $this->Recurso->create();
                
                $this->Carpeta->id = $this->request->data["Recurso"]["idCarpeta"];
                $carpeta = $this->Carpeta->read();
                $filename = $this->request->data["Recurso"]["ubicacion"]["name"];
                move_uploaded_file($this->request->data['Recurso']["ubicacion"]["tmp_name"], WWW_ROOT. DS . "files" . DS . "drive" . DS . $carpeta["Carpeta"]["descripcion"] . DS . $filename);  
                unset($this->request->data["Recurso"]["ubicacion"]);
                $this->request->data["Recurso"]["ubicacion"] = $filename;
                if ($this->Recurso->save($this->request->data)) {
                    $this->Session->setFlash(__("El recurso ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar el recurso."), "flash_bootstrap");
            }
        }
            
        public function registrar() {
            $this->layout = "docente";
       
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
     
            $horarios = $this->Docente->Horario->find("all", array(
                "fields" => array("DISTINCT Horario.idCurso"),
                "conditions" => array("Horario.idDocente" => $docente["Docente"]["idDocente"])
            ));
            
            foreach ($horarios as $horario) {
                $curso = $this->Docente->Horario->Curso->find("first", array(
                    "fields" => array("Curso.idCurso", "Curso.descripcion"),
                    "conditions" => array("Curso.idCurso" => $horario["Horario"]["idCurso"])
                ));
                $cursos[$curso["Curso"]["idCurso"]] = $curso["Curso"]["descripcion"];
            }
            
            $this->set("cursos", $cursos);
        }
        
        public function getCarpetas() {
            $this->layout = "ajax";
            
            $idCurso = $this->request->data["idCurso"];
            $carpetas = $this->Carpeta->find("all", array(
                "conditions" => array("Carpeta.idCurso" => $idCurso)
            ));
                      
            $listaCarpetas = $this->Carpeta->find("list", array(
                "fields" => array("Carpeta.idCarpeta", "Carpeta.descripcion"),
                "conditions" => array("Carpeta.idCurso" => $idCurso, "Carpeta.tipo" => "escritura")
            ));
            
            $this->set("listaCarpetas", $listaCarpetas);
            $this->set("carpetas", $carpetas);
        }
        
        public function getCarpetasDocente() {
            $this->layout = "ajax";
            
            $idCurso = $this->request->data["idCurso"];
            $carpetas = $this->Carpeta->find("all", array(
                "conditions" => array("Carpeta.idCurso" => $idCurso)
            ));
                      
            $listaCarpetas = $this->Carpeta->find("list", array(
                "fields" => array("Carpeta.idCarpeta", "Carpeta.descripcion"),
                "conditions" => array("Carpeta.idCurso" => $idCurso)
            ));
            
            $this->set("listaCarpetas", $listaCarpetas);
            $this->set("carpetas", $carpetas);
        }
    }
?>