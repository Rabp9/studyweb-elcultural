<!-- File: /app/View/CUrsos/edit.ctp -->
<?php 
    $this->html->addCrumb('CUrsos', '/CUrsos');
    $this->html->addCrumb('Editar', '/CUrsos/editar');
?>

<h2>CUrsos <small>Editar</small></h2>

<?php
    echo $this->Form->create("Curso");
    echo $this->Html->para("lead", "Modifique los datos del Curso:");
    echo $this->Form->input("idCurso", array("type" => "hidden"));
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->input('idGrado', array(
        "label" => "Grado",
        "div" => "formField",
        "options" => $grados
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista CUrsos", array("controller" => "CUrsos", "action" => "index"));
?>