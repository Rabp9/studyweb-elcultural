<!-- File: /app/View/Mensajes/index.ctp -->

<h2>Mensajes <small>Seleccionar Curso</small></h2>

<?php
    echo $this->Form->create("Mensaje", array('default' => false));
    echo $this->Form->input("idCurso", array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno",
        "name" => "data[idCurso]"
    ));
    echo $this->Html->div(null, "", array("id" => "dvMensajes"));
    echo $this->Form->input("Mensaje.asunto", array(
        "label" => "Asunto",
        "div" => "formField"
    ));
    echo $this->Form->label("Mensaje.cuerpo", "Registrar Mensaje");
    echo "<br/>";
    echo $this->Form->textarea("Mensaje.cuerpo", array(
        "div" => "formField",
        "rows" => 5,
        "cols" => 120,
    ));   
    echo "<br/>";
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
?>
<?php
    $this->Js->get('#MensajeIndexForm')->event('submit',
        $this->Js->request(array(
            'controller'=>'Mensajes',
            'action'=>'getMensajes'
        ), array(
            'update'=>'#dvMensajes',
            'async' => true,
            'method' => 'post',
            'dataExpression'=>true,
            'data'=> $this->Js->get('#MensajeIndexForm')->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        ))
    );
?>
<?php
    $this->Js->get('#MensajeIdCurso')->event('change', 
        $this->Js->request(array(
            'controller'=>'Mensajes',
            'action'=>'getMensajes'
        ), array(
            'update'=>'#dvMensajes',
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