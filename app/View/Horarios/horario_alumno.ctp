<!-- file path View/Horarios/horario_Alumno.ctp -->

<?php 
    $this->html->addCrumb('Horarios', '/horario_Alumno');
?>

<h2>Horario <small>Consulta de Horario</small></h2>
<style>
    .clase_si {
        background-color: #18C0DF;
        color: #0066cc;
    }
    .clase_no {
        background-color: #EE3550;
        color: white;
    }
</style>
<table id="tblHorario">
    <thead>
        <tr>
            <th>Hora</th>
            <th <?php echo $matricula["Periodo"]["domingo"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Domingo
                <input type="hidden" id="rest0" value="17"/>
            </th>
            <th <?php echo $matricula["Periodo"]["lunes"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Lunes
                <input type="hidden" id="rest1" value="17"/>
            </th>
            <th <?php echo $matricula["Periodo"]["martes"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Martes
                <input type="hidden" id="rest2" value="17"/>
            </th>
            <th <?php echo $matricula["Periodo"]["miercoles"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Miércoles
                <input type="hidden" id="rest3" value="17"/>
            </th>
            <th <?php echo $matricula["Periodo"]["jueves"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Jueves
                <input type="hidden" id="rest4" value="17"/>
            </th>
            <th <?php echo $matricula["Periodo"]["viernes"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Viernes
                <input type="hidden" id="rest5" value="17"/>
            </th>
            <th <?php echo $matricula["Periodo"]["sabado"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Sábado
                <input type="hidden" id="rest6" value="17"/>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $horaInicio = '07:00';
            $horaFin = '15:00';
            $inicio = 0;
            while ($horaInicio <= $horaFin) {
        ?>
        <tr>
            <td><?php echo $horaInicio; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
                $horaInicio = strtotime("+30 minutes", strtotime($horaInicio));
                $horaInicio = date("H:i", $horaInicio);
            }
        ?>
    </tbody>
</table>
<?php
    $this->Html->scriptStart(array('inline' => false));
?>
    $(document).ready(function () {
        <?php
        $js_array = json_encode($horarios);
        echo "var horarios = ". $js_array . ";\n";
        ?>
        $.each( horarios, function( index, value ){
            $("#tblHorario tbody").find("tr:eq(" + value.Horario.hora + ")").find("td:eq(" + (parseInt(value.Horario.dia) + 1) + ")").html(
                "<h5>" + value.Curso.descripcion + " <small>Aula:" + value.Aula.descripcion + "</small></h5>" + 
                "<hr/><h5>" + value.Docente.nombreCompleto + "</5>"
            );
        });
    })
<?php
    $this->Html->scriptEnd();
?>