<!-- File: /app/View/Articulos/view.ctp -->
<?php 
    $this->html->addCrumb('Artículos', '/Articulos');
    $this->html->addCrumb('Ver', '/Articulos/Ver');
?>


<h2>Artículos <small>Ver</small></h2>

<dl class="dl-horizontal">
    <dt>Código</dt>
    <dd><?php echo $articulo["Articulo"]["idArticulo"]; ?></dd>
    <dt>Título</dt>
    <dd><?php echo $articulo["Articulo"]["titulo"]; ?></dd>
    <dt>Descripción</dt>
    <dd><?php echo $articulo["Articulo"]["descripcion"]; ?></dd>  
    <dt>Foto</dt>
    <dd><?php echo $this->Html->image("novedades" . DS . $articulo["Articulo"]["foto"], array(
        "width" => "300px"
    )); ?></dd>
    <dt>Fecha de Publicación</dt>
    <dd><?php echo $articulo["Articulo"]["created"]; ?></dd>
</dl>
<?php echo $this->Html->link("Regresar a Lista Articulos", array("controller" => "Articulos", "action" => "index")); ?>
