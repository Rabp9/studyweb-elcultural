<!-- file path View/Asistencias/get_form_notas.ctp -->

<?php
    echo $this->Form->input("trimestre", array(
        "label" => "Trimestre",
        "div" => "formField",
        "options" => array(
            "I" => "I", 
            "II" => "II", 
            "III" => "III"
        )
    ))
?>

<?php
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "options" => array(
            "Evaluacion 1" => "Evaluación 1", 
            "Evaluacion 2" => "Evaluación 2", 
            "Examen Final" => "Examen Final", 
            "Trabajo Individual" => "Trabajo Individual",
            "Actitudinal" => "Actitudinal"
        )
    ))
?>

<?php  
    echo $this->Form->input("peso", array(
        "label" => "Peso",
        "div" => "formField",
        "type" => "number",
        "min" => 1,
        "max" => 5,
        "value" => 1
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