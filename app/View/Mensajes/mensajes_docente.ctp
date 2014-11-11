<!-- File: /app/View/Mensajes/mensajes_docente.ctp -->
<?php 
    $this->html->addCrumb('Mensajes', '/Mensajes');
?>

<h2>Mensajes <small>Seleccionar Curso</small></h2>

<?php     
    echo $this->Form->create("Mensajes", array(
        "controller" => "Mensajes",
        "action" => "mensajesDocente"
    ));
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno",
        "name" => "data[idCurso]"
    ));
    echo $this->Html->div(null, "", array("id" => "dvSecciones"));
    echo $this->Html->div(null, "", array("id" => "dvAlumnos"));
    echo $this->Html->div(null, "", array("id" => "dvMensajes"));
    echo $this->Html->div(null, "", array("id" => "dvFormulario"));
    echo $this->Form->end();
?>

<?php
    $this->Js->get('#MensajesIdCurso')->event('change', 
        $this->Js->request(array(
            'controller' => 'Secciones',
            'action' => 'getSeccionesByCurso'
        ), array(
            'update'=>'#dvSecciones',
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
    $('body').on('change', '#idSeccion', function() {
        $.ajax({
            async:true, 
            data: $("#MensajesMensajesDocenteForm").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvAlumnos").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Alumnos\/getAlumnosBySeccion"
        });
    });
<?php
    $this->Html->scriptEnd();
?>

<?php
    $this->Html->scriptStart(array('inline' => false));
?>
    $('body').on('change', '#idAlumno', function() {
        $.ajax({
            async:true, 
            data: $("#MensajesMensajesDocenteForm").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvFormulario").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Mensajes\/mensajesFormDocente"
        });      
        $.ajax({
            async:true, 
            data: $("#MensajesMensajesDocenteForm").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvMensajes").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Mensajes\/getMensajesDocente"
        });
    });
<?php
    $this->Html->scriptEnd();
?>