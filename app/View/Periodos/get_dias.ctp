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
<table>
    <thead>
        <tr>
            <th>Hora</th>
            <th <?php echo $periodo["Periodo"]["domingo"] ? "class='clase_si'" : "class='clase_no'"; ?>>Domingo</th>
            <th <?php echo $periodo["Periodo"]["lunes"] ? "class='clase_si'" : "class='clase_no'"; ?>>Lunes</th>
            <th <?php echo $periodo["Periodo"]["martes"] ? "class='clase_si'" : "class='clase_no'"; ?>>Martes</th>
            <th <?php echo $periodo["Periodo"]["miercoles"] ? "class='clase_si'" : "class='clase_no'"; ?>>Miércoles</th>
            <th <?php echo $periodo["Periodo"]["jueves"] ? "class='clase_si'" : "class='clase_no'"; ?>>Jueves</th>
            <th <?php echo $periodo["Periodo"]["viernes"] ? "class='clase_si'" : "class='clase_no'"; ?>>Viernes</th>
            <th <?php echo $periodo["Periodo"]["sabado"] ? "class='clase_si'" : "class='clase_no'"; ?>>Sábado</th>
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
                        "class" => "btn btn-primary",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso"
                    )) :
                    "" 
                ?>
            </td>
            <td>
                <?php echo $periodo["Periodo"]["lunes"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso"
                    )) :
                    "" 
                ?>
            </td>
            <td>
                <?php echo $periodo["Periodo"]["martes"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso"
                    )) :
                    "" 
                ?>
            </td>         
            <td>
                <?php echo $periodo["Periodo"]["miercoles"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso"
                    )) :
                    "" 
                ?>
            </td>         
            <td>
                <?php echo $periodo["Periodo"]["jueves"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso"
                    )) :
                    "" 
                ?>
            </td>        
            <td>
                <?php echo $periodo["Periodo"]["viernes"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso"
                    )) :
                    "" 
                ?>
            </td>          
            <td>
                <?php echo $periodo["Periodo"]["sabado"] ? 
                    $this->Form->button("Agregar Curso", array(
                        "type" => "button",
                        "class" => "btn btn-primary",
                        "data-toggle" => "modal",
                        "data-target" => "#mdlDetalleCurso"
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
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Seleccionar Curso</h4>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>