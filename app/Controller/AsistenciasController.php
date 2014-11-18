<!-- File: /app/Controller/AsistenciasController.php -->

<?php
    class AsistenciasController extends AppController {
        public $uses = array("User", "Alumno", "Asistencia", "Docente", "Curso");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getAsistenciasByCurso", "registrar", "getFormAsistencias", "reporte");
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
            
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
            
            $fecha = $this->request->data["fecha"];
            $fecha = $fecha["year"] . "-" . $fecha["month"] . "-" . $fecha["day"];
            
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
                if(!isset($this->request->data["editar"])) {
                    foreach($this->request->data["Matriculas"]["idMatricula"] as $key => $value) {
                        $asistencias[] = array(
                            "idMatricula" => $value,
                            "idCurso" => $this->request->data["idCurso"],
                            "fecha" => $fecha,
                            "clase" => 1,
                            "descripcion" => $this->request->data["Asistencias"]["descripcion"][$key]
                        );
                    }
                    $this->Asistencia->saveMany($asistencias);
                } else {
                    $matriculas = $this->request->data["Matriculas"]["idMatricula"];
                    $asistencias = $this->request->data["Asistencias"]["descripcion"];
                    foreach ($matriculas as $indice => $matricula) {
                        $asistencia = $this->Asistencia->find("first", array(
                            "conditions" => array(
                                "Asistencia.idMatricula" => $matricula,
                                "Asistencia.idCurso" => $this->request->data["idCurso"],
                                "Asistencia.fecha" => $fecha,
                            )
                        ));
                        $asistencia["Asistencia"]["descripcion"] = $asistencias[$indice];
                        $this->Asistencia->id = $asistencia["Asistencia"]["idAsistencia"];
                        $this->Asistencia->save($asistencia);
                    }
                }
                $this->Session->setFlash(__("Las asistencias han sido registradas correctamente."), "flash_bootstrap"); 
            }
        }
        
        public function getFormAsistencias() {
            $this->layout = "ajax";
            $idSeccion = $this->request->data["idSeccion"];
            $idCurso = $this->request->data["idCurso"];
            
            $matriculas = $this->Alumno->Matricula->find("all", array(
                "conditions" => array("Matricula.idSeccion" => $idSeccion)
            ));
            
            foreach ($matriculas as $matricula) {
                $alumnos[] = $this->Alumno->find("first", array(
                    "conditions" => array("Alumno.idAlumno" => $matricula["Matricula"]["idAlumno"])
                ));
            }
            $fecha = $this->request->data["fecha"];
            $fecha = $fecha["year"] . "-" . $fecha["month"] . "-" . $fecha["day"];
            $auxAlumno = $alumnos[0];
            $auxAsistencia = $this->Asistencia->find("first", array(
               "conditions" => array(
                   "idCurso" => $idCurso, 
                   "idMatricula" => $auxAlumno["Matricula"]["idMatricula"],
                   "fecha" => $fecha
                )
            ));
            if(!empty($auxAsistencia)) {
                foreach ($alumnos as $alumno) {
                    $descripcion = $this->Asistencia->field("descripcion", array(
                        "idMatricula" => $alumno["Matricula"]["idMatricula"],
                        "idCurso" => $idCurso,
                        "fecha" => $fecha
                    ));
                    $alumno["Alumno"]["Asistencia"] = $descripcion;
                    $alumnos_editar[] = $alumno;
                }
            }
            $this->set("alumnos_editar", $alumnos_editar);
            $this->set("alumnos", $alumnos);
        }
        
        public function reporte($idAlumno = null) {
            $this->layout = "admin";
            if ($idAlumno) { 
                $alumno = $this->Alumno->findByIdalumno($idAlumno);
     
                $this->Alumno->Matricula->id = $alumno["Matricula"]["idMatricula"];
                $matricula = $this->Alumno->Matricula->read();
            
                $this->Alumno->Matricula->Seccion->id = $matricula["Matricula"]["idSeccion"];
                $seccion = $this->Alumno->Matricula->Seccion->read();

                $this->Alumno->Matricula->Seccion->Grado->id = $seccion["Seccion"]["idGrado"];
                $grado = $this->Alumno->Matricula->Seccion->Grado->read();

                $this->set("cursos", $this->Alumno->Matricula->Seccion->Grado->Curso->find("all", array(
                    "conditions" => array("Curso.idGrado" => $grado["Grado"]["idGrado"])
                )));
                
                $this->set("asistencias", $this->Asistencia->find("all", array(
                    "conditions" => array(
                        "Asistencia.idMatricula" => $matricula["Matricula"]["idMatricula"]
                    )
                )));
                
                $this->render("resultado");
            }
        }
    }
?>