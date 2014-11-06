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
            <li><?php echo $estadisticas["primerPuesto"] ?></li>
            <li><?php echo $estadisticas["segundoPuesto"] ?></li>
            <li><?php echo $estadisticas["tercerPuesto"] ?></li>
        </ol>
    </dd>
    <dt>Nº Aprobados</dt>
    <dd><?php echo $estadisticas["nro_aprobados"]; ?></dd>
    <dt>Nº Desaprobados</dt>
    <dd><?php echo $estadisticas["nro_desaprobados"]; ?></dd>
    <dt>Nota Mínima</dt>
    <dd><?php echo $estadisticas["notaMinima"]; ?></dd>
    <dt>Nota Máxima</dt>
    <dd><?php echo $estadisticas["notaMaxima"]; ?></dd>
    <dt>Nº de Clases</dt>
    <dd><?php echo $estadisticas["nro_clases"]; ?></dd>
</dl>

<?php
    echo $this->Form->end("Exportar a PDF");
?>

