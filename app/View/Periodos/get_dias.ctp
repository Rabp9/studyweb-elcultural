<!-- file path View/Periodos/get_dias.ctp -->
<style>
    .clase_si {
        background-color: #18C0DF;
        color: #0066cc;
    }
    .clase_no {
        background-color: red;
        color: white;
    }
</style>
<table id="tblHorario">
    <thead>
        <tr>
            <th>Hora</th>
            <th <?php echo $periodo["Periodo"]["domingo"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Domingo
                <input class="hdnRest" type="hidden" id="rest0" value="17"/>
            </th>
            <th <?php echo $periodo["Periodo"]["lunes"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Lunes
                <input class="hdnRest" type="hidden" id="rest1" value="17"/>
            </th>
            <th <?php echo $periodo["Periodo"]["martes"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Martes
                <input class="hdnRest" type="hidden" id="rest2" value="17"/>
            </th>
            <th <?php echo $periodo["Periodo"]["miercoles"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Miércoles
                <input class="hdnRest" type="hidden" id="rest3" value="17"/>
            </th>
            <th <?php echo $periodo["Periodo"]["jueves"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Jueves
                <input class="hdnRest" type="hidden" id="rest4" value="17"/>
            </th>
            <th <?php echo $periodo["Periodo"]["viernes"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Viernes
                <input class="hdnRest" type="hidden" id="rest5" value="17"/>
            </th>
            <th <?php echo $periodo["Periodo"]["sabado"] ? "class='clase_si'" : "class='clase_no'"; ?>>
                Sábado
                <input class="hdnRest" type="hidden" id="rest6" value="17"/>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php
            $horaInicio = '07:00';
            $horaFin = '15:00';
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
        <tr>
            <td></td>
            <td>
                <?php echo $periodo["Periodo"]["domingo"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary agregar",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso",
                        "data-dia" => 0
                    )) :
                    "" 
                ?>
            </td>
            <td>
                <?php echo $periodo["Periodo"]["lunes"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary agregar",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso",
                        "data-dia" => 1
                    )) :
                    "" 
                ?>
            </td>
            <td>
                <?php echo $periodo["Periodo"]["martes"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary agregar",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso",
                        "data-dia" => 2
                    )) :
                    "" 
                ?>
            </td>         
            <td>
                <?php echo $periodo["Periodo"]["miercoles"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary agregar",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso",
                        "data-dia" => 3
                    )) :
                    "" 
                ?>
            </td>         
            <td>
                <?php echo $periodo["Periodo"]["jueves"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary agregar",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso",
                        "data-dia" => 4
                    )) :
                    "" 
                ?>
            </td>        
            <td>
                <?php echo $periodo["Periodo"]["viernes"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary agregar",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso",
                        "data-dia" => 5
                    )) :
                    "" 
                ?>
            </td>          
            <td>
                <?php echo $periodo["Periodo"]["sabado"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary agregar",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso",
                        "data-dia" => 6
                    )) :
                    "" 
                ?>
            </td>
        </tr>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="mdlDetalleCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <input type="hidden" id="dia" value=""/>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Seleccionar Curso</h4>
            </div>
            <div class="modal-body" id="dvCursos">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="aceptar">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('body').on('click', '.agregar', function() {
        $.ajax({
            async:true, 
            data: $("#PeriodoIdGrado").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvCursos").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Horarios\/getDetail"
        });
        var dia = $(this).attr("data-dia");
        $("#dia").val(dia);
    });
</script>

<script type="text/javascript">
    $("#aceptar").click(function() {
        var curso = {
            idCurso: $("#idCurso").val(),
            descripcion: $("#idCurso option:selected").text()
        };
        var aula = {
            idAula: $("#idAula").val(),
            descripcion: $("#idAula option:selected").text()
        };
        var docente = {
            idDocente: $("#idDocente").val(),
            descripcion: $("#idDocente option:selected").text()
        };
        var horas = $("#horas").val();
        var dia = $("#dia").val();
        
        var rest = $("#rest" + dia).val();
        if(parseInt(rest) < parseInt(horas)) {
            alert("No hay horas disponibles");
            return true;
        }
        for(var i = 0; i < horas; i++) {
            $("#tblHorario tbody tr:eq(" + (i + 17 - rest) + ") td:eq(" + (parseInt(dia)+1) + ")").html(
                "<h5>" + curso.descripcion + " <small>Aula:" + aula.descripcion+ "</small></h5>" +
                "<hr/><h5>" + docente.descripcion + "</5>" +
                "<input type='hidden' name=data[idCursos][" + dia + "][] value='" + curso.idCurso + "' />" + 
                "<input type='hidden' name=data[idAulas][" + dia + "][] value='" + aula.idAula + "' />"  +
                "<input type='hidden' name=data[idDocentes][" + dia + "][] value='" + docente.idDocente + "' />"
            );
        }
        $("#rest" + dia).val($("#rest" + dia).val() - horas);
    });
</script>
