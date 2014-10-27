<!-- File: /app/View/Cursos/edit.ctp -->
<?php 
    $this->html->addCrumb('Cursos', '/Cursos');
    $this->html->addCrumb('Editar', '/Cursos/editar');
?>

<h2>Cursos <small>Editar</small></h2>

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
    echo $this->Html->link("Regresar a Lista Artículos", array("controller" => "Articulos", "action" => "index"));
?>