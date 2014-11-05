<!-- file path View/Reportes/estadisticas_detalle.ctp -->

<dl class="dl-horizontal">
    <dt>Docente</dt>
    <dd><?php echo $estadisticas["docente"]; ?></dd>
    <dt>Grado y Seeción</dt>
    <dd><?php echo $estadisticas["grado_seccion"]; ?></dd>
    <dt>Promedio</dt>
    <dd><?php echo $estadisticas["promedio"]; ?></dd>
    <dt>Nº Alumnos</dt>
    <dd><?php echo $estadisticas["nro_alumnos"]; ?></dd>
    <dt>Primeros Puestos</dt>
    <dd>
        <ol>
            <li>Juan</li>
            <li>Marco</li>
            <li>Luis</li>
        </ol>
    </dd>
    <dt>Nº Aprobados</dt>
    <dd><?php echo $estadisticas["nro_aprobados"]; ?></dd>
    <dt>Nº Desaprobados</dt>
    <dd><?php echo $estadisticas["nro_desaprobados"]; ?></dd>
</dl>

<?php
/*
 * Nombre de Docente------------------
 * Grado y Secciòn--------------------
 * Nota Promedio----------------------
 * Numero de alumnos------------------
 * 3 primeros puestos
 * Numero de alumnos aprobados--------
 * Numero de alumnos desaprobados-----
 * Nota minima
 * Nota maxima
 * Nro de clases
*/
    echo $this->Form->end("Exportar a PDF");
?>

