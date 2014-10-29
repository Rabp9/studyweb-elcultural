<!-- File: /app/Controller/HorariosController.php -->

<?php
    class HorariosController extends AppController {     
        public $helpers = array('Js');
        public $uses = array("Periodo", "Grado", "Seccion", "Curso", "Aula", "Docente", "Horario", "Alumno");   
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("getDetail", "horarioAlumno");
        }

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
                foreach($this->request->data["idCursos"] as $key => $value) {
                    $hora = 0;
                    foreach ($value as $indice => $val) {
                        $horarios[] = array(
                            "dia" => $key,
                            "idCurso" => $val,
                            "idSeccion" => $this->request->data["Periodo"]["idSeccion"],
                            "idPeriodo" => $this->request->data["Periodo"]["idPeriodo"],
                            "idAula" => $this->request->data["idAulas"][$key][$indice],
                            "idDocente" => $this->request->data["idDocentes"][$key][$indice],
                            "estado" => 1,
                            "hora" => $hora
                        );
                        $hora++;
                    }
                }
                $this->Horario->saveMany($horarios);
                $this->Session->setFlash(__("El horario ha sido registrado correctamente."), "flash_bootstrap"); 
            }
        }
        
        public function getDetail() {
            $idGrado = $this->request->data['Periodo']['idGrado'];

            $this->set("cursos", $this->Curso->find("list", array(
                "fields" => array("Curso.idCurso", "Curso.descripcion"),
                'conditions' => array('Curso.estado' => '1', "Curso.idGrado" => $idGrado)
            )));
            
            $this->set("aulas", $this->Aula->find("list", array(
                "fields" => array("Aula.idAula", "Aula.descripcion")
            )));
            
            $this->set("docentes", $this->Docente->find("list", array(
                "fields" => array("Docente.idDocente", "Docente.nombreCompleto")
            )));
            
            $this->layout = 'ajax';
	}
        
        public function horarioAlumno() {
            $this->layout = "alumno";
            
            $user = $this->Auth->user();
            $alumno = $this->Alumno->findByIduser($user["idUser"]);
            
            $this->Alumno->Matricula->id = $alumno["Matricula"]["idMatricula"];
            $matricula = $this->Alumno->Matricula->read();
            
            $horarios = $this->Horario->find("all", array(
                "conditions" => array(
                    "idSeccion" => $matricula["Seccion"]["idSeccion"],
                    "idPeriodo" => $matricula["Matricula"]["idPeriodo"]
                )
            ));
            $this->set("matricula", $matricula);
            $this->set("horarios", $horarios);
        }
}