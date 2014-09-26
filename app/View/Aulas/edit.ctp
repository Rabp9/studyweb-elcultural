<!-- File: /app/View/Aulas/edit.ctp -->
<?php 
    $this->html->addCrumb('Aulas', '/Aulas');
    $this->html->addCrumb('Editar', '/Aulas/Editar');
?>
<h2>Aulas <small>Editar</small></h2>

<?php
    echo $this->Form->create("Aula");
    echo $this->Html->para("lead", "Modifique los datos del Aula:");
    echo $this->Form->input("idAula", array("type" => "hidden"));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Aulas", array("controller" => "Aulas", "action" => "index"));
?>