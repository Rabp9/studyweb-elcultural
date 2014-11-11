<!-- File: /app/View/Asistencias/index.ctp -->
<?php 
    $this->html->addCrumb('Asistencias', '/Asistencias');
?>

<h2>Asistencias <small>Verificar</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvAsistencias"));
?>

<?php
    $this->Js->get('#idCurso')->event('change', 
        $this->Js->request(array(
            'controller' => 'Asistencias',
            'action' => 'getAsistenciasByCurso'
        ), array(
            'update'=>'#dvAsistencias',
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