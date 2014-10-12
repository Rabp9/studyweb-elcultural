<!-- File: /app/Controller/MensajesController.php -->

<?php
    class MensajesController extends AppController {
        public $uses = array("Alumno", "Curso", "DetalleMensajeAlumno", "Mensaje");   
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getMensajes");
        }

        public function index() {    
            $this->layout = "alumno";
            
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
            
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
              
        public function getMensajes() {
            $this->layout = "ajax";
            
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
            $idCurso = $this->request->data["idCurso"];
            
            $detalle = $this->DetalleMensajeAlumno->find("first", array(
                "conditions" => array("idCurso" => $idCurso, "idAlumno" => $alumno["Alumno"]["idAlumno"])
            ));
            if(empty($detalle)) {
                $registroDetalle = array(
                    "idAlumno" => $alumno["Alumno"]["idAlumno"],
                    "idCurso" => $idCurso,
                );
                $this->DetalleMensajeAlumno->save($registroDetalle);
                $detalle = $this->DetalleMensajeAlumno->find("first", array(
                    "conditions" => array("idCurso" => $idCurso, "idAlumno" => $alumno["Alumno"]["idAlumno"])
                ));
            }
            
            if (isset($this->request->data["Mensaje"])) {
                $this->request->data["Mensaje"]["idDetalleMensajeAlumno"] = $detalle["DetalleMensajeAlumno"]["idDetalleMensajeAlumno"];
                $this->request->data["Mensaje"]["remite"] = "Alumno";                
                $this->request->data["Mensaje"]["destinatario"] = "Docente";
                if($this->Mensaje->save($this->request->data))
                    $this->Session->setFlash(__("El mensaje fue registrado correctamente."), "flash_bootstrap");
            }
            
            $mensajes = $this->Mensaje->find("all", array(
               "conditions" => array("idDetalleMensajeAlumno" => $detalle["DetalleMensajeAlumno"]["idDetalleMensajeAlumno"]) 
            ));

            $this->set("mensajes", $mensajes);
        }
}