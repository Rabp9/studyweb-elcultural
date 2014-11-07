<!-- File: /app/Controller/ReportesController.php -->

<?php
    class ReportesController extends AppController {
        public $uses = array("Docente", "Curso", "Matricula", "Nota");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow("estadisticas", "estadisticasDetalle", "estadisticasPdf", "notas", "notasDetalle", "notasPdf");
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
                    "fields" => array("Curso.idCurso", "Curso.descripcion", "Grado.descripcion"),
                    "conditions" => array("Curso.idCurso" => $horario["Horario"]["idCurso"])
                ));
                $cursos[$curso["Curso"]["idCurso"]] = $curso["Curso"]["descripcion"] . " (" . $curso["Grado"]["descripcion"] . ")";
            }
            
            $this->set("cursos", $cursos);
        }
        
        public function estadisticasDetalle() {
            $this->layout = "ajax";
            
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
            $curso = $this->Curso->findByIdcurso($this->request->data["idCurso"]);
            $seccion = $this->Curso->Grado->Seccion->findByIdseccion($this->request->data["idSeccion"]);
            
            $suma = 0;
            $matriculas = $this->Matricula->find("all", array(
                "conditions" => array("Matricula.estado" => 1, "Seccion.idSeccion" => $seccion["Seccion"]["idSeccion"])
            ));
            $aprobados = 0;
            
            foreach ($matriculas as $matricula) {
                $notas = $this->Nota->find("all", array(
                    "conditions" => array("Nota.idMatricula" => $matricula["Matricula"]["idMatricula"], "Nota.idCurso" => $curso["Curso"]["idCurso"])
                ));
                $subnota = 0;
                $factor = 0;
                foreach ($notas as $nota) {
                    $subnota += $nota["Nota"]["valor"] * $nota["Nota"]["peso"];
                    $factor += $nota["Nota"]["peso"];
                }
                $promedio = $subnota / $factor;
                if($promedio >= 10.5)
                    $aprobados++;
                $suma += $promedio;
                
                $puestos[$promedio] = $matricula["Alumno"]["nombreCompleto"] . " (" . number_format($promedio, 2) .")";
                $max_min[] = $promedio;
            }
            $promedioFinal = $suma / count($matriculas);
            krsort($puestos);
            arsort($max_min);
            
            $estadisticas["primerPuesto"] = array_slice($puestos, 0, 1)[0];
            $estadisticas["segundoPuesto"] = array_slice($puestos, 1, 2)[0];
            $estadisticas["tercerPuesto"] = array_slice($puestos, 2, 3)[0];
            $estadisticas["notaMinima"] = number_format(array_slice($max_min, count($max_min) - 1)[0], 2);
            $estadisticas["notaMaxima"] = number_format(array_slice($max_min, 0, 1)[0], 2);
            $estadisticas["promedio"] = number_format($promedioFinal, 2);
            $estadisticas["nro_alumnos"] = count($matriculas);           
            $estadisticas["nro_aprobados"] = $aprobados;       
            $estadisticas["nro_desaprobados"] = count($matriculas) - $aprobados;
            $estadisticas["docente"] = $docente["Docente"]["nombreCompleto"];
            $estadisticas["grado_seccion"] = $curso["Grado"]["descripcion"] . " " .  $seccion["Seccion"]["descripcion"];
            $estadisticas["nro_clases"] = count($matriculas[0]["Asistencia"]);
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
            
            $suma = 0;
            $matriculas = $this->Matricula->find("all", array(
                "conditions" => array("Matricula.estado" => 1, "Seccion.idSeccion" => $seccion["Seccion"]["idSeccion"])
            ));
            $aprobados = 0;
            
            foreach ($matriculas as $matricula) {
                $notas = $this->Nota->find("all", array(
                    "conditions" => array("Nota.idMatricula" => $matricula["Matricula"]["idMatricula"], "Nota.idCurso" => $curso["Curso"]["idCurso"])
                ));
                $subnota = 0;
                $factor = 0;
                foreach ($notas as $nota) {
                    $subnota += $nota["Nota"]["valor"] * $nota["Nota"]["peso"];
                    $factor += $nota["Nota"]["peso"];
                }
                $promedio = $subnota / $factor;
                if($promedio >= 10.5)
                    $aprobados++;
                $suma += $promedio;
                
                $puestos[$promedio] = $matricula["Alumno"]["nombreCompleto"] . " (" . number_format($promedio, 2) .")";
                $max_min[] = $promedio;
            }
            $promedioFinal = $suma / count($matriculas);
            krsort($puestos);
            arsort($max_min);
            
            $estadisticas["primerPuesto"] = array_slice($puestos, 0, 1)[0];
            $estadisticas["segundoPuesto"] = array_slice($puestos, 1, 2)[0];
            $estadisticas["tercerPuesto"] = array_slice($puestos, 2, 3)[0];
            $estadisticas["notaMinima"] = number_format(array_slice($max_min, count($max_min) - 1)[0], 2);
            $estadisticas["notaMaxima"] = number_format(array_slice($max_min, 0, 1)[0], 2);
            $estadisticas["promedio"] = number_format($promedioFinal, 2);
            $estadisticas["nro_alumnos"] = count($matriculas);           
            $estadisticas["nro_aprobados"] = $aprobados;       
            $estadisticas["nro_desaprobados"] = count($matriculas) - $aprobados;
            $estadisticas["docente"] = $docente["Docente"]["nombreCompleto"];
            $estadisticas["grado_seccion"] = $curso["Grado"]["descripcion"] . " " .  $seccion["Seccion"]["descripcion"];
            $estadisticas["nro_clases"] = count($matriculas[0]["Asistencia"]);
            $this->set('estadisticas', $estadisticas);
     
            $this->response->type("application/pdf");
        }
        
        public function notas() {
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
        
        public function notasDetalle() {
            $this->layout = "ajax";         
        }
        
        public function notasPdf() {
            App::import('Vendor', 'Fpdf', array('file' => 'fpdf/fpdf.php'));
            $this->layout = 'pdf'; //this will use the pdf.ctp layout
            
            $this->set('fpdf', new FPDF('P','mm','A4'));
            $this->set('titulo', 'Reporte de Notas de Curso'); 
                
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
            $curso = $this->Curso->findByIdcurso($this->request->data["idCurso"]);
            $seccion = $this->Curso->Grado->Seccion->findByIdseccion($this->request->data["idSeccion"]);
            
            $suma = 0;
            $matriculas = $this->Matricula->find("all", array(
                "conditions" => array("Matricula.estado" => 1, "Seccion.idSeccion" => $seccion["Seccion"]["idSeccion"])
            ));
            $i = 0;
            foreach ($matriculas as $matricula) {
                $reporteNotas[$i]["Alumno"] = $matricula["Alumno"];
                $notas = $this->Nota->find("all", array(
                    "conditions" => array("Nota.idMatricula" => $matricula["Matricula"]["idMatricula"], "Nota.idCurso" => $curso["Curso"]["idCurso"])
                ));
                $subnota = 0;
                $factor = 0;
                foreach ($notas as $nota) {
                    $subnota += $nota["Nota"]["valor"] * $nota["Nota"]["peso"];
                    $factor += $nota["Nota"]["peso"];
                    $reporteNotas[$i]["Notas"][] = $nota["Nota"];
                }
                $promedio = $subnota / $factor;
                $reporteNotas[$i]["promedio"] = number_format($promedio, 2);
                $i++;
            }
            $promedioFinal = $suma / count($matriculas);
            
            $this->set("reporteNotas", $reporteNotas);
            $this->set("promedioFinal", $promedioFinal);
            
            $this->response->type("application/pdf");
        }
    }
?>