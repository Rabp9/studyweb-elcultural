<!-- File: /app/Controller/RecursosController.php -->

<?php
    class RecursosController extends AppController {
        public $uses = array("User", "Alumno", "Recurso", "Curso", "Carpeta", "Docente", "Periodo");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getCarpetas", "registrar", "getCarpetasDocente", "crearCarpeta", "download");
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
                $curso = $this->Curso->findByIdcurso($carpeta["Carpeta"]["idCurso"]);
                $grado = $this->Curso->Grado->findByIdgrado($curso["Grado"]["idGrado"]);
                $periodo = $this->Periodo->findByEstado(1);
                
                $filename = $this->request->data["Recurso"]["ubicacion"]["name"];
                move_uploaded_file($this->request->data['Recurso']["ubicacion"]["tmp_name"], 
                    WWW_ROOT. DS . 
                    "files" . DS . 
                    "drive" . DS . 
                    $periodo["Periodo"]["idPeriodo"] ." - " . $periodo["Periodo"]["descripcion"] . DS . 
                    $grado["Grado"]["idGrado"] ." - " . $grado["Grado"]["descripcion"] . DS .
                    $curso["Curso"]["idCurso"] . " - " . $curso["Curso"]["descripcion"] . DS .
                    $carpeta["Carpeta"]["descripcion"] . DS . $filename
                );  
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
                    "fields" => array("Curso.idCurso", "Curso.descripcion", "Grado.descripcion"),
                    "conditions" => array("Curso.idCurso" => $horario["Horario"]["idCurso"])
                ));
                $cursos[$curso["Curso"]["idCurso"]] = $curso["Curso"]["descripcion"] . " (" . $curso["Grado"]["descripcion"] . ")";
            }
            
            $this->set("cursos", $cursos);

            if($this->request->is("post")) {  
                $this->Recurso->create();
                  
                $this->Carpeta->id = $this->request->data["Recurso"]["idCarpeta"];
                $carpeta = $this->Carpeta->read();
                $curso = $this->Curso->findByIdcurso($carpeta["Carpeta"]["idCurso"]);
                $grado = $this->Curso->Grado->findByIdgrado($curso["Grado"]["idGrado"]);
                $periodo = $this->Periodo->findByEstado(1);
                
                $filename = $this->request->data["Recurso"]["ubicacion"]["name"];
                move_uploaded_file($this->request->data['Recurso']["ubicacion"]["tmp_name"], 
                    WWW_ROOT. DS . 
                    "files" . DS . 
                    "drive" . DS . 
                    $periodo["Periodo"]["idPeriodo"] ." - " . $periodo["Periodo"]["descripcion"] . DS . 
                    $grado["Grado"]["idGrado"] ." - " . $grado["Grado"]["descripcion"] . DS .
                    $curso["Curso"]["idCurso"] . " - " . $curso["Curso"]["descripcion"] . DS .
                    $carpeta["Carpeta"]["descripcion"] . DS . $filename
                );  
                unset($this->request->data["Recurso"]["ubicacion"]);
                $this->request->data["Recurso"]["ubicacion"] = $filename;
           
                if ($this->Recurso->save($this->request->data)) {
                    $this->Session->setFlash(__("El recurso ha sido registrado correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "registrar"));
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
            
            $this->set("idCurso", $idCurso);
            $this->set("listaCarpetas", $listaCarpetas);
            $this->set("carpetas", $carpetas);
        }
        
        public function crearCarpeta() {
            $periodo = $this->Periodo->findByEstado(1);
            $curso = $this->Curso->findByIdcurso($this->request->data["Carpeta"]["idCurso"]);
            $grado = $this->Curso->Grado->findByIdgrado($curso["Grado"]["idGrado"]);
            
            $this->request->data["Carpeta"]["idPeriodo"] = $periodo["Periodo"]["idPeriodo"];
            $this->Carpeta->create();
            if ($this->Carpeta->save($this->request->data)) {
                mkdir(WWW_ROOT . DS . 
                    "files" . DS . 
                    "drive" . DS . 
                    $periodo["Periodo"]["idPeriodo"] ." - " . $periodo["Periodo"]["descripcion"] . DS . 
                    $grado["Grado"]["idGrado"] ." - " . $grado["Grado"]["descripcion"] . DS .
                    $curso["Curso"]["idCurso"] . " - " . $curso["Curso"]["descripcion"] . DS .
                    $this->request->data["Carpeta"]["descripcion"], 0777, true
                );
                $this->Session->setFlash(__("La carpeta ha sido registrada correctamente."), "flash_bootstrap");
                return $this->redirect(array("action" => "registrar"));
            }
        }
        
        public function download($idRecurso) {
            $this->viewClass = 'Media';
            
            // Ubicaciòn
            $periodo = $this->Periodo->findByEstado(1);
            $recurso = $this->Recurso->findByIdrecurso($idRecurso);
            $carpeta = $this->Recurso->Carpeta->findByIdcarpeta($recurso["Carpeta"]["idCarpeta"]);
            $curso = $this->Curso->findByIdcurso($carpeta["Curso"]["idCurso"]);
            $grado = $this->Curso->Grado->findByIdgrado($curso["Grado"]["idGrado"]);
                    
            $params = array(
                'id'        => $recurso["Recurso"]["ubicacion"],
                'name'      => $recurso["Recurso"]["descripcion"],
                'download'  => true,
                'extension' => 'nbm',
                'path'      => WWW_ROOT . DS . 
                    "files" . DS . 
                    "drive" . DS . 
                    $periodo["Periodo"]["idPeriodo"] . " - " . $periodo["Periodo"]["descripcion"] . DS . 
                    $grado["Grado"]["idGrado"] . " - " . $grado["Grado"]["descripcion"] . DS . 
                    $curso["Curso"]["idCurso"] . " - " . $curso["Curso"]["descripcion"] . DS . 
                    $carpeta["Carpeta"]["descripcion"] . DS
            );
            $this->set($params);
        }
    }
?>