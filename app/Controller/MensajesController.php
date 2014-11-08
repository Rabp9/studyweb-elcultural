<!-- File: /app/Controller/MensajesController.php -->

<?php
    class MensajesController extends AppController {
        public $uses = array("Alumno", "Curso", "DetalleMensajeAlumno", "Mensaje", "Docente");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getMensajes", "mensajesDocente", "mensajesDetalle");
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
        
        public function mensajesDocente() {
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
        }
        
        public function mensajesDetalle() {
            $this->layout = "ajax";
            
            $idSeccion = $this->request->data["idSeccion"];

            $matriculas = $this->Alumno->Matricula->find("all", array(
                "conditions" => array("Matricula.idSeccion" => $idSeccion)
            ));
            
            foreach ($matriculas as $matricula) {
                $alumno = $this->Alumno->find("first", array(
                    "conditions" => array("Alumno.idAlumno" => $matricula["Matricula"]["idAlumno"])
                ));
                $alumnos[$alumno["Alumno"]["idAlumno"]] = $alumno["Alumno"]["nombreCompleto"];
            }
            
            $this->set("alumnos", $alumnos);
        }
}