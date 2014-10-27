<!-- file path View/Reportes/estadisticas.ctp -->

<h2>Reportes <small>Estadísticas</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvEstadisticas"));
    /*
     * Nombre de Docente
     * Grado y Secciòn
     * Nota Promedio
     * Numero de alumnos
     * 3 primeros puestos
     * Numero de alumnos aprobados
     * Numero de alumnos desaprobados
     * Nota minima
     * Nota maxima
     * Nro de clases
     */
?>