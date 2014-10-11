<!-- File: /app/View/Matriculas/index.ctp -->
<?php 
    $this->html->addCrumb('Matriculas', '/Matriculas');
?>

<h2>Matricula <small>Matricula a un Alumno</small></h2>

<?php
    echo $this->Form->create();
?>
<div class="row">
    <div class="col-xs-6">
<?php
    echo $this->Form->input('idPeriodo', array(
        "label" => "Periodo",
        "div" => "formField",
        "options" => $periodos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Form->input('idGrado', array(
        "label" => "Grado",
        "div" => "formField",
        "options" => $grados,
        "empty" => "Selecciona uno"
    ));    
    echo $this->Form->input('idSeccion', array(
        "label" => "Sección",
        "div" => "formField",
        "type" => "select",
        "disabled" => true
    ));
?>
    </div>
    <div class="col-xs-6">
<?php
    echo $this->Form->input("Alumno.idAlumno", array(
        "label" => "Alumno",
        "div" => "formField",
        "data-toggle" => "modal",
        "data-target" => "#mdlBuscarAlumno",
    ));
    echo $this->Form->input("Alumno.nombreCompleto", array(
        "label" => "Nombre Completo",
        "div" => "formField",
        "readonly" => true
    ));
?>
    </div>
</div>
<?php
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array(
        "class" => "btn btn-default", 
        "id" => "btnRegistrar"
    ));
    echo $this->Form->end();
?>
<?php
    $this->Js->get('#PeriodoIdGrado')->event('change', 
        $this->Js->request(array(
            'controller'=>'Secciones',
            'action'=>'getByGrado'
        ), array(
            'update'=>'#PeriodoIdSeccion',
            'async' => true,
            'method' => 'post',
            'dataExpression'=>true,
            'data'=> $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            )),
            "success" => "$('#PeriodoIdSeccion').attr({disabled: false});"
        ))
    );
?>

<!-- Modal -->
<div class="modal fade" id="mdlBuscarAlumno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Seleccionar Alumno</h4>
            </div>
            <div class="modal-body" id="dvBuscarAlumnos">
                <?php echo $this->requestAction(array(
                    "controller" => "Alumnos",
                    "action" => "getAlumnos"
                )); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="aceptar">Aceptar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<?php
    $this->Js->get('#busqueda')->event('keyup', 
        $this->Js->request(array(
            'controller'=> 'Alumnos',
            'action'=> 'getAlumnos'
        ), array(
            'update'=>'#dvBuscarAlumnos',
            'async' => true,
            'method' => 'post',
            'dataExpression'=>true,
            'data'=> $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        ))
    );
?>
<?php
    $this->Html->scriptStart(array('inline' => false));

?>
    $("body").on("click", ".seleccionarAlumno", function() {
        var codigo = $(this).parent().parent().find(".tdIdAlumno").text();
        var nombreCompleto = $(this).parent().parent().find(".tdNombreCompleto").text();
        $("#AlumnoIdAlumno").val(codigo);      
        $("#AlumnoNombreCompleto").val(nombreCompleto);
        $("#mdlBuscarAlumno").modal('toggle');
        $("#busqueda").val("");
    });
<?php
    $this->Html->scriptEnd();
?>