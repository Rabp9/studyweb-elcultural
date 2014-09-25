<?php
    $articulos = $this->requestAction("/articulos/ultimos");
    foreach($articulos as $articulo) {
?>
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="" alt="<?php echo $articulo["Articulo"]["titulo"]; ?>">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $articulo["Articulo"]["titulo"]; ?></h4>
        <?php echo $articulo["Articulo"]["descripcion"]; ?>
    </div>
</div>
<?php
    }
?>