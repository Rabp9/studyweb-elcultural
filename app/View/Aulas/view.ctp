<!-- File: /app/View/Aulas/view.ctp -->
<?php 
    $this->html->addCrumb('Aulas', '/Aulas');
    $this->html->addCrumb('Ver', '/Aulas/Ver');
?>

<h2>Aulas <small>Ver</small></h2>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $aula["Aula"]["idAula"]; ?></dd>
    <dt>Aula</dt>
    <dd><?php echo $aula["Aula"]["descripcion"]; ?></dd>
    <dt>Piso</dt>
    <dd><?php echo $aula["Aula"]["piso"]; ?></dd>  
</dl>
<?php echo $this->Html->link("Regresar a Lista Aulas", array("controller" => "Aulas", "action" => "index")); ?>
