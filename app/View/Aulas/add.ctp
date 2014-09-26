<!-- File: /app/View/Aula/add.ctp -->
<?php 
    $this->html->addCrumb('Aulas', '/Aulas');
    $this->html->addCrumb('Nuevo', '/Aulas/Nuevo');
?>

<h2>Aulas <small>Nuevo</small></h2>

<?php
    echo $this->Form->create("Aula");
    echo $this->Html->para("lead", "Ingrese los datos del Aula:");
    echo $this->Form->input("descripcion", array(
        "label" => "Descripción",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    $pisos = array(
        '1ª Piso' => '1ª Piso', 
        '2ª Piso' => '2ª Piso', 
        '3ª Piso' => '3ª Piso', 
        '4ª Piso' => '4ª Piso'
    );
    echo $this->Form->input('piso', array(
        'options' => $pisos, 
        "div" => "formField"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Aulas", array("controller" => "Aulas", "action" => "index"));
?>