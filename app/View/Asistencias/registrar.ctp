<!-- File: /app/View/Asistencias/registrar.ctp -->

<h2>Asistencias <small>Registrar</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvSecciones"));
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
    $('body').on('click', '#idSeccion', function() {
        $.ajax({
            async:true, 
            data: $("#idSeccion").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvAsistencias").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Asistencias\/getFormAsistencias"
        });
    });
<?php
    $this->Html->scriptEnd();
?>