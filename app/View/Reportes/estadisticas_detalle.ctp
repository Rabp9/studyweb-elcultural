<!-- file path View/Reportes/estadisticas_detalle.ctp -->

<dl class="dl-horizontal">
    <dt>Docente</dt>
    <dd><?php echo $estadisticas["docente"]; ?></dd>
    <dt>Grado y Seeción</dt>
    <dd><?php echo $estadisticas["grado_seccion"]; ?></dd>
</dl>

<?php
/*
 * Nombre de Docente-------
 * Grado y Secciòn---------
 * Nota Promedio
 * Numero de alumnos
 * 3 primeros puestos
 * Numero de alumnos aprobados
 * Numero de alumnos desaprobados
 * Nota minima
 * Nota maxima
 * Nro de clases
*/
    echo $this->Form->end("Exportar a PDF");
?>

