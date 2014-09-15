<!-- File: /app/View/Users/add.ctp -->

<h2>Usuarios <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("User");
    echo $this->Html->para("lead", "Ingrese los datos del Usuario:");
    echo $this->Form->input("username", array(
        "label" => "Nombre de Usuario",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input("password", array(
        "label" => "Password",
        "div" => "formField"
    ));
    echo $this->Form->input('rol', array(
        'options' => array(
            "admin" => "Admin", "author" => "Author"
        ), 
        "div" => "formField"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Usuarios", array("controller" => "Users", "action" => "index"));
?>