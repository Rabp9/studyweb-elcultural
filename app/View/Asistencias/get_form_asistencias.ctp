<!-- file path View/Asistencias/get_form_asistencias.ctp -->

<?php
    echo $this->Form->input("fecha", array(
        "label" => "Fecha: ",
        "div" => "formField",
        "value" => date("Y-m-d"),
        "readonly" => true
    ))
?>

<?php
    echo $this->Html->css("asistencias");
?>
<?php
    if(is_null($alumnos_editar)) {
?>
<table class="asistencias">
    <thead>
        <tr>
            <th>Alumno</th>
            <th colspan="4">Condición</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 0;
        foreach ($alumnos as $alumno) {
        ?>
        <tr>
            <td>
                <input type="hidden" name="data[Matriculas][idMatricula][<?php echo $index; ?>]" value="<?php echo $alumno["Matricula"]["idMatricula"] ?>" />
                <?php
                    echo $alumno["Alumno"]["nombreCompleto"]; 
                ?>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Asistió">
                        Asistió
                    </label>
                </div>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Tarde">
                        Tarde
                    </label>
                </div>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Falta">
                        Falta
                    </label>
                </div>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Falta Justificada">
                        Falta Justificada
                    </label>
                </div>
            </td>
        </tr>
        <?php
        $index++;
        }
        ?>
    </tbody>
</table>

<?php
    } else {
?>
<input type="hidden" name="editar" value="true" />
<table class="asistencias">
    <thead>
        <tr>
            <th>Alumno</th>
            <th colspan="4">Condición</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $index = 0;
        foreach ($alumnos_editar as $alumno) {
        ?>
        <tr>
            <td>
                <input type="hidden" name="data[Matriculas][idMatricula][<?php echo $index; ?>]" value="<?php echo $alumno["Matricula"]["idMatricula"] ?>" />
                <?php
                    echo $alumno["Alumno"]["nombreCompleto"]; 
                ?>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Asistió" <?php echo $alumno["Alumno"]["Asistencia"] == "Asistió" ? "checked" : "" ?>>
                        Asistió
                    </label>
                </div>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Tarde" <?php echo $alumno["Alumno"]["Asistencia"] == "Tarde" ? "checked" : "" ?>>
                        Tarde
                    </label>
                </div>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Falta" <?php echo $alumno["Alumno"]["Asistencia"] == "Falta" ? "checked" : "" ?>>
                        Falta
                    </label>
                </div>
            </td>
            <td>
                <div class="radio">
                    <label>
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Falta Justificada" <?php echo $alumno["Alumno"]["Asistencia"] == "Falta Justificada" ? "checked" : "" ?>>
                        Falta Justificada
                    </label>
                </div>
            </td>
        </tr>
        <?php
        $index++;
        }
        ?>
    </tbody>
</table>
<?php
    }
?>