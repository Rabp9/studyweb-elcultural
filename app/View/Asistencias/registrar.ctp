<!-- File: /app/View/Asistencias/registrar.ctp -->
<?php 
    $this->html->addCrumb('Asistencias', '/Asistencias');
    
    $this->assign("title", "Asistencias - Registrar");
?>

<h2>Asistencias <small>Registrar</small></h2>
<?php
    echo $this->Form->create(false);
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvSecciones"));
    echo $this->Form->input("fecha", array(
        "label" => "Fecha: ",
        "div" => "formField",
        "value" => date("Y-m-d"),
        "type" => "date",
        "readonly" => true
    ));
    echo $this->Html->div(null, "", array("id" => "dvAsistencias"));
?>

<?php
    $this->Js->get('#idCurso')->event('change', 
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

    var form_asistencias = function() {
        $.ajax({
            async:true, 
            data: $("#registrarForm").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvAsistencias").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Asistencias\/getFormAsistencias"
        });
    };
    $('body').on('change', '#idSeccion', form_asistencias);
    $('body').on('change', 'div.formField select', form_asistencias);
<?php
    $this->Html->scriptEnd();
?>

    
<?php
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
?>