<!-- File: /app/View/Notas/registrar.ctp -->
<?php 
    $this->html->addCrumb('Notas', '/Notas');
    
    $this->assign("title", "Notas - Registrar");
?>


<h2>Notas <small>Registrar</small></h2>
<?php
    echo $this->Form->create(false);
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvSecciones"));
    echo $this->Html->div(null, "", array("id" => "dvNotas"));
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
    $('body').on('click', '#idSeccion', function() {
        $.ajax({
            async:true, 
            data: $("#idSeccion").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvNotas").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Notas\/getFormNotas"
        });
    });
<?php
    $this->Html->scriptEnd();
?>

    
<?php
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
?>