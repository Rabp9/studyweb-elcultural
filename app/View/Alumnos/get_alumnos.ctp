<!-- file path View/Alumnos/get_alumnos.ctp -->

<div id="dvBuscarAlumnos">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre Completo</th>
                <th>Apoderado</th>
                <th>Seleccionar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno) { ?>
            <tr>
                <td class="tdIdAlumno"><?php echo $alumno["Alumno"]["idAlumno"]; ?></td>
                <td class="tdNombreCompleto"><?php echo $alumno["Alumno"]["apellidoPaterno"] . " " . $alumno["Alumno"]["apellidoMaterno"] . ", " . $alumno["Alumno"]["nombres"]; ?></td>
                <td><?php echo $alumno["Alumno"]["direccion"]; ?></td>
                <td><?php echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . "", array("class" => "btn btn-default seleccionarAlumno")); ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
