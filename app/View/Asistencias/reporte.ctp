<!-- File: /app/View/Asistencias/reporte.ctp -->
<?php 
    $this->html->addCrumb('Asistencias', '/Asistencias');
    
    $this->assign("title", "Asistencias - Reporte");
?>

<h2>Asistencias <small>Reporte</small></h2>

<?php 
    echo $this->requestAction(array(
        "controller" => "Alumnos",
        "action" => "getAlumnosReporte", "Asistencias"
    )); 
?>