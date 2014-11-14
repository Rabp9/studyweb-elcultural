<!-- File: /app/View/Asistencias/resultado.ctp -->
    
<?php 
    $this->html->addCrumb('Asistencias', '/Asistencias');
    
    $this->assign("title", "Asistencias - Reporte");
?>

<?php
    echo $this->Html->css("asistencias");
?>

<h2>Asistencias <small>Reporte</small></h2>
<?php
    foreach ($cursos as $curso) {
        echo "<h4>" . $curso["Curso"]["descripcion"] . "</h4>";
?>
    <table class="asistencias">
        <thead>
            <tr>
                <th>Clase</th>
                <th>Fecha</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($asistencias as $asistencia) {
            if($asistencia["Asistencia"]["idCurso"] == $curso["Curso"]["idCurso"]) {
?>   
            <tr>
                <td><?php echo $asistencia["Asistencia"]["clase"]; ?></td>
                <td class="fecha"><?php echo $asistencia["Asistencia"]["fecha"]; ?></td>
                <td><?php echo $asistencia["Asistencia"]["descripcion"]; ?></td>
            </tr>
<?php
            }
        }
?>
        </tbody>
    </table>
<?php
    }
?>