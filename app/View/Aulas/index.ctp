<!-- File: /app/View/Aulas/index.ctp -->
<?php 
    $this->html->addCrumb('Aulas', '/Aulas');
?>

<h2>Aulas <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Aula</th>
                <th>Piso</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aulas as $aula) { ?>
            <tr>
                <td><?php echo $aula["Aula"]["idAula"]; ?></td>
                <td><?php echo $aula["Aula"]["descripcion"]; ?></td>
                <td><?php echo $aula["Aula"]["piso"]; ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-th-list"></span> Acción
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-zoom-in")) .
                                        " Ver",
                                        array("controller" => "Aulas", "action" => "view", $aula["Aula"]["idAula"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Aulas", "action" => "edit", $aula["Aula"]["idAula"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Aulas", "action" => "delete", $aula["Aula"]["idAula"]),
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
        echo $this->Html->link("Nueva Aula", array(
            "controller" => "Aulas", "action" => "add"
        ));
    ?>
</div>