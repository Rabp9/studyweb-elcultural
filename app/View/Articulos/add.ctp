<!-- File: /app/View/Articulos/add.ctp -->
<?php 
    $this->html->addCrumb('Artículos', '/Articulos');
    $this->html->addCrumb('Nuevo', '/Articulos/Nuevo');
?>

<h2>Artículos <small>Nuevo</small></h2>

<?php
    echo $this->Html->script('ckeditor/ckeditor');
    
    echo $this->Form->create("Articulo", array("type" => "file"));
    echo $this->Html->para("lead", "Ingrese los datos del Artìculo:");
    echo $this->Form->input("titulo", array(
        "label" => "Tìtulo",
        "div" => "formField",
        "autofocus" => "autofocus"
    ));
    echo $this->Form->label("descripcion", "Descripción");
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
    echo $this->Html->link("Regresar a Lista Artículos", array("controller" => "Articulos", "action" => "index"));
?>