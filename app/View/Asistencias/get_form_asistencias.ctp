<!-- file path View/Asistencias/get_form_asistencias.ctp -->

<?php
    echo $this->Form->input("fecha", array(
        "label" => "Fecha: ",
        "div" => "formField",
        "value" => date("Y-m-d"),
        "readonly" => true
    ))
?>
<table>
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
                        <input type="radio" name="data[Asistencias][descripcion][<?php echo $index; ?>]" value="Temprano">
                        Temprano
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