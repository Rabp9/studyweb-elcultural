<!-- File: /app/View/Horario/index.ctp -->
<?php 
    $this->html->addCrumb('Horarios', '/Horarios');
    
    $this->assign("title", "Horarios - Registrar");
?>

<h2>Horarios <small>Registrar</small></h2>

<?php
    echo $this->Form->create();
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
    echo $this->Html->div("formField", "", array("id" => "dvHorario"));
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

<?php
    $this->Js->get('#PeriodoIdPeriodo')->event('change', 
        $this->Js->request(array(
            'controller' => 'Periodos',
            'action' => 'getDias'
        ), array(
            'update'=>'#dvHorario',
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
    $this->Js->get('#PeriodoIndexForm')->event('submit', 
        "var rest = 0;
        $('table#tblHorario').find('th.clase_si').each(function() {
            rest += parseInt($(this).find('.hdnRest').val());
        });
        if(rest == 0) return true;
        alert('Aún no ha terminado de llenar el horario');
        return false;"
    );
?>

<?php
    $this->Html->scriptStart(array('inline' => false));
?>
    $('body').on('click', '#PeriodoIdSeccion', function() {
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