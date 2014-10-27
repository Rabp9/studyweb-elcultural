<!-- file path View/Asistencias/get_form_notas.ctp -->

<?php
    echo $this->Form->input("unidad", array(
        "label" => "Unidad",
        "div" => "formField",
        "options" => array(
            "I" => "I", 
            "II" => "II", 
            "III" => "III", 
            "IV" => "IV"
        )
    ))
?>

<?php
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "options" => array(
            "Examen Parcial" => "Examen Parcial", 
            "Examen Final" => "Examen Final", 
            "Comportamiento" => "Comportamiento", 
            "etc" => "etc"
        )
    ))
?>
<table>
    <thead>
        <tr>
            <th>Alumno</th>
            <th>Nota</th>
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
                        <input type="number" name="data[Notas][valor][<?php echo $index; ?>]" value="" step="0.5" min="0" max="20">
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