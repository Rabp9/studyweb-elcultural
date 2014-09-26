<!-- File: /app/View/Users/index.ctp -->
<?php 
    $this->html->addCrumb('Usuarios', '/Users');
?>

<h2>Usuarios <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Usuario</th>
                <th>Grupo</th>
                <th>Creado</th>
                <th>Acciòn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
            <tr>
                <td><?php echo $user["User"]["idUser"]; ?></td>
                <td><?php echo $user["User"]["username"]; ?></td>
                <td><?php echo $user["Grupo"]["descripcion"]; ?></td>
                <td><?php echo $user["User"]["created"]; ?></td>
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
                                        array("controller" => "Users", "action" => "view", $user["User"]["idUser"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Users", "action" => "edit", $user["User"]["idUser"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Users", "action" => "delete", $user["User"]["idUser"]),
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
        echo $this->Html->link("Nuevo Usuario", array(
            "controller" => "Users", "action" => "add"
        ));
    ?>
</div>