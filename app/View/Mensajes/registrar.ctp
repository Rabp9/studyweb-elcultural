<!-- File: /app/View/Mensajes/registrar.ctp -->

<h2>Mensajes <small>Registrar</small></h2>

<?php
    echo $this->Form->create("Mensaje");
    echo $this->Html->para("lead", "Ingrese un mensaje:");
    echo $this->Form->textarea("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
?>