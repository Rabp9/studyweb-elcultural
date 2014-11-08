<!-- File: /app/View/Mensajes/mensajes_docente.ctp -->

<h2>Mensajes <small>Seleccionar Curso</small></h2>

<?php     
    echo $this->Form->create("Mensajes", array(
        "controller" => "Mensajes",
        "action" => "index"
    ));
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno",
        "name" => "data[idCurso]"
    ));
    echo $this->Html->div(null, "", array("id" => "dvSecciones"));
    echo $this->Html->div(null, "", array("id" => "dvMensajes"));
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
    $('body').on('click', '#idSeccion', function() {
        $.ajax({
            async:true, 
            data: $("#MensajesIndexForm").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvMensajes").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Mensajes\/mensajesDetalle"
        });
    });
<?php
    $this->Html->scriptEnd();
?>