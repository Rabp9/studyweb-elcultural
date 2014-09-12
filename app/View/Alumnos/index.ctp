<!-- File: /app/View/Alumnos/index.ctp -->

<h2>Alumnos <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Còdigo</th>
                <th>Nombre Completo</th>
                <th>Apoderado</th>
                <th>Fecha de Nac.</th>
                <th>Dirección</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alumno) { ?>
            <tr>
                <td><?php echo $alumno["Alumno"]["idAlumno"]; ?></td>
                <td><?php echo $alumno["Alumno"]["apellidoPaterno"] . " " . $alumno["Alumno"]["apellidoMaterno"] . ", " . $alumno["Alumno"]["nombres"]; ?></td>
                <td><?php echo $alumno["Alumno"]["nombreApoderado"]; ?></td>
                <td><?php echo $alumno["Alumno"]["fechaNac"]; ?></td>
                <td><?php echo $alumno["Alumno"]["direccion"]; ?></td>
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
                                        array("controller" => "Alumnos", "action" => "view", $alumno["Alumno"]["idAlumno"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Alumnos", "action" => "edit", $alumno["Alumno"]["idAlumno"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Alumnos", "action" => "delete", $alumno["Alumno"]["idAlumno"]),
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
        echo $this->Html->link("Nuevo Alumno", array(
            "controller" => "Alumnos", "action" => "add"
        ));
    ?>
</div>