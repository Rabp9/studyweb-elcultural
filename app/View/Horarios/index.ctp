<!-- File: /app/View/Horario/index.ctp -->
<?php 
    $this->html->addCrumb('Horarios', '/Horarios');
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
        "alert('validar');
         return true;"
    );
?>