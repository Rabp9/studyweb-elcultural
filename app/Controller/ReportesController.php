<!-- File: /app/Controller/ReportesController.php -->

<?php
    class ReportesController extends AppController {
        public $uses = array("Docente");
        
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
     
            $estadisticas["docente"] = $docente["Docente"]["nombreCompleto"];
            
            $this->set("estadisticas", $estadisticas);
        }
          
        public function estadisticasPdf() {
            //Import /app/Vendor/Fpdf
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
            //Assign layout to /app/View/Layout/pdf.ctp
            $this->layout = 'pdf'; //this will use the pdf.ctp layout
            //Set fpdf variable to use in view
            $this->set('fpdf', new FPDF('P','mm','A4'));
            //pass data to view
            $this->set('data', 'Hello, PDF world');
            //render the pdf view (app/View/[view_name]/pdf.ctp)
            $this->render("estadisticasPdf");
        }
    }
?>