<!-- File: /app/View/Grados/index.ctp -->
<?php 
    $this->html->addCrumb('Grados', '/Grados');
?>

<h2>Grados <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Grado</th>
                <th>Nivel</th>
                <th>Acciòn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($grados as $grado) { ?>
            <tr>
                <td><?php echo $grado["Grado"]["idGrado"]; ?></td>
                <td><?php echo $grado["Grado"]["descripcion"]; ?></td>
                <td><?php echo $grado["Grado"]["nivel"]; ?></td>
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
                                        array("controller" => "Grados", "action" => "view", $grado["Grado"]["idGrado"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Grados", "action" => "edit", $grado["Grado"]["idGrado"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Grados", "action" => "delete", $grado["Grado"]["idGrado"]),
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
        echo $this->Html->link("Nuevo Grado", array(
            "controller" => "Grados", "action" => "add"
        ));
    ?>
</div>