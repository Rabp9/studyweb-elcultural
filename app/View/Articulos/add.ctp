<!-- File: /app/View/Articulos/add.ctp -->

<h2>Artìculos <small>Nuevo</small></h2>

<?php
    echo $this->Html->script('ckeditor/ckeditor');
    
    echo $this->Form->create("Articulo", array("type" => "file"));
    echo $this->Html->para("lead", "Ingrese los datos del Artìculo:");
    echo $this->Form->input("titulo", array(
        "label" => "Tìtulo",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Html->para(null, "Esriba la descripciòn del artìculo:");
    echo $this->Form->textarea('descripcion', array(
        'class' => 'ckeditor'
    ));
    echo $this->Form->input("foto", array(
        "label" => "Foto",
        "div" => "formField",
        "type" => "file"
    ));
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-ok")) . " Registrar", array("class" => "btn btn-default"));
    echo $this->Form->end();
    echo $this->Html->link("Regresar a Lista Articulos", array("controller" => "Articulos", "action" => "index"));
?>