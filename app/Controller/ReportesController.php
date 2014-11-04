<!-- File: /app/Controller/ReportesController.php -->

<?php
    class ReportesController extends AppController {
        public $uses = array("Docente", "Curso");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("estadisticas", "estadisticasDetalle", "estadisticasPdf");
        }
        
        public function estadisticas() {
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
        
        public function estadisticasDetalle() {
            $this->layout = "ajax";
            
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
            $curso = $this->Curso->findByIdcurso($this->request->data["idCurso"]);
            $seccion = $this->Curso->Grado->Seccion->findByIdseccion($this->request->data["idSeccion"]);
            
            $estadisticas["docente"] = $docente["Docente"]["nombreCompleto"];
            $estadisticas["grado_seccion"] = $curso["Grado"]["descripcion"] . " " .  $seccion["Seccion"]["descripcion"];
            
            $this->set("estadisticas", $estadisticas);
        }
          
        public function estadisticasPdf() {
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout
            
            $this->set('fpdf', new FPDF('P','mm','A4'));
            $this->set('titulo', 'Reporte de Estadísticas de Curso'); 
            
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
            $curso = $this->Curso->findByIdcurso($this->request->data["idCurso"]);
            $seccion = $this->Curso->Grado->Seccion->findByIdseccion($this->request->data["idSeccion"]);
            
            $estadisticas["docente"] = $docente["Docente"]["nombreCompleto"];
            $estadisticas["grado_seccion"] = $curso["Grado"]["descripcion"] . " " .  $seccion["Seccion"]["descripcion"];
           
            $this->set('estadisticas', $estadisticas);
     
            $this->response->type("application/pdf");
        }
    }
?>