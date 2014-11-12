<!-- File: /app/View/Recursos/index.ctp -->
<?php 
    $this->html->addCrumb('Recursos', '/Recursos');
    
    $this->assign("title", "Recursos - Gestionar");
?>

<h2>Cursos <small>Gestionar Recursos</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvRecursos"));
?>

<?php
    $this->Js->get('#idCurso')->event('change', 
        $this->Js->request(array(
            'controller' => 'Recursos',
            'action' => "getCarpetas"
        ), array(
            'update'=>'#dvRecursos',
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