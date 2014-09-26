<?php
    $articulos = $this->requestAction("/articulos/ultimos");
    foreach($articulos as $articulo) {
?>
<div class="media">
    <?php
        echo $this->html->link(
            $this->Html->image("novedades/" . $articulo["Articulo"]["foto"], array(
                "alt" => $articulo["Articulo"]["titulo"],
                "class" => "media-object",
                "width" => "100px"
            )),
            array(
                "controller" => "Articulos",
                "action" => "view", $articulo["Articulo"]["idArticulo"]
            ),
            array(
                "escape" => false, 
                "class" => "pull-left"
            )
        )    
    ?>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $articulo["Articulo"]["titulo"]; ?></h4>
        <?php echo $articulo["Articulo"]["descripcion"]; ?>
    </div>
</div>
<?php
    }
?>