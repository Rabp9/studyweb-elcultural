<!-- File: /app/Controller/RecursosController.php -->

<?php
    class RecursosController extends AppController {
        public $uses = array("User", "Alumno", "Recurso", "Curso", "Carpeta");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getCarpetas");
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
    }
?>