<!-- File: /app/View/Notas/index.ctp -->

<h2>Notas <small>Verificar</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos
    ));
    echo $this->Html->div(null, "", array("id" => "dvNotas"));
?>

<?php
    $this->Js->get('#idCurso')->event('change', 
        $this->Js->request(array(
            'controller' => 'Notas',
            'action' => 'getNotasByCurso'
        ), array(
            'update'=>'#dvNotas',
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