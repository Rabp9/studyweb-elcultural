<!-- file path View/Reportes/estadisticas.ctp -->

<h2>Reportes <small>Estadísticas</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvEstadisticas"));
    
?>

<?php
    $this->Js->get('#idCurso')->event('change',
        $this->Js->request(array(
            'controller' => 'Reportes',
            'action' => 'estadisticasDetalle'
        ), array(
            'update'=>'#dvEstadisticas',
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