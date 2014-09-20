<!-- File: /app/View/Docentes/index.ctp -->

<h2>Docentes <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Còdigo</th>
                <th>Nombre Completo</th>
                <th>Fecha de Nac.</th>
                <th>Dirección</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($docentes as $docente) { ?>
            <tr>
                <td><?php echo $docente["Docente"]["idDocente"]; ?></td>
                <td><?php echo $docente["Docente"]["apellidoPaterno"] . " " . $docente["Docente"]["apellidoMaterno"] . ", " . $docente["Docente"]["nombres"]; ?></td>
                <td><?php echo $docente["Docente"]["fechaNac"]; ?></td>
                <td><?php echo $docente["Docente"]["direccion"]; ?></td>
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
                                        array("controller" => "Docentes", "action" => "view", $docente["Docente"]["idDocente"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Docentes", "action" => "edit", $docente["Docente"]["idDocente"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Docentes", "action" => "delete", $docente["Docente"]["idDocente"]),
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
        echo $this->Html->link("Nuevo Docente", array(
            "controller" => "Docentes", "action" => "add"
        ));
    ?>
</div>