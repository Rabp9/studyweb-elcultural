<!-- File: /app/View/Mensajes/mensajes_form_docente.ctp -->

<?php
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