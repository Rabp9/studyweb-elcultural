<!-- File: /app/View/Notas/reporte.ctp -->
<?php 
    $this->html->addCrumb('Asistencias', '/Asistencias');
    
    $this->assign("title", "Asistencias - Reporte");
?>

<h2>Notas <small>Reporte</small></h2>

<?php 
    echo $this->requestAction(
        array(
            "controller" => "Alumnos",
            "action" => "getAlumnosReporte", "Notas"
        )
    ); 
?>