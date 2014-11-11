<!-- file path View/Reportes/estadisticas.ctp -->
<?php 
    $this->html->addCrumb('Reportes', '/Reportes');
?>

<h2>Reportes <small>Estadísticas</small></h2>
<?php 
    echo $this->Form->create("Reportes", array(
        "controller" => "Reportes",
        "action" => "estadisticasPdf"
    ));
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno",
        "name" => "data[idCurso]"
    ));
    echo $this->Html->div(null, "", array("id" => "dvSecciones"));
    echo $this->Html->div(null, "", array("id" => "dvEstadisticas"));
    echo $this->Form->end();
?>

<?php
    $this->Js->get('#ReportesIdCurso')->event('change', 
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
            data: $("#ReportesEstadisticasPdfForm").serialize(), 
            dataType:"html", 
            success:function (data, textStatus) {
                $("#dvEstadisticas").html(data);
            }, 
            type:"post", 
            url:"\/studyweb-elcultural\/Reportes\/estadisticasDetalle"
        });
    });
<?php
    $this->Html->scriptEnd();
?>