<!-- File: /app/View/Articulos/index.ctp -->

<h2>Articulos <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Còdigo</th>
                <th>Tìtulo</th>
                <th>Fecha Publicaciòn</th>
                <th>Acciòn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulos as $articulo) { ?>
            <tr>
                <td><?php echo $articulo["Articulo"]["idArticulo"]; ?></td>
                <td><?php echo $articulo["Articulo"]["titulo"]; ?></td>
                <td><?php echo $articulo["Articulo"]["created"]; ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-th-list"></span> Acciòn
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-zoom-in")) .
                                        " Ver",
                                        array("controller" => "Articulos", "action" => "view", $articulo["Articulo"]["idArticulo"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Articulos", "action" => "edit", $articulo["Articulo"]["idArticulo"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Articulos", "action" => "delete", $articulo["Articulo"]["idArticulo"]),
                                        array("confirm" => "¿Estás seguro?", "escape" => false)
                                    );
                                ?>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
        echo $this->Html->link("Nuevo Articulo", array(
            "controller" => "Articulos", "action" => "add"
        ));
    ?>
</div>