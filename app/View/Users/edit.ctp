<!-- File: /app/View/Users/edit.ctp -->
<?php 
    $this->html->addCrumb('Usuarios', '/Users');
    $this->html->addCrumb('Editar', '/Users/edit');
?>

<h2>Usuarios <small>Editar</small></h2>

<?php
    echo $this->Form->create("User");
    echo $this->Html->para("lead", "Modifique los datos del usuario:");
    echo $this->Form->input("idUser", array("type" => "hidden"));
    echo $this->Form->input("username", array(
        "label" => "Nombre de Usuario",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input('password', array(
        'default' => 'Primaria',
        "div" => "formField"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Users", array("controller" => "Users", "action" => "index"));
?>