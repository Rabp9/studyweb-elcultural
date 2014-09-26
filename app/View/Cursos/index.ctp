<!-- File: /app/View/Seccion/index.ctp -->
<?php 
    $this->html->addCrumb('Cursos', '/Cursos');
?>

<h2>Cursos <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Còdigo</th>
                <th>Curso</th>
                <th>Grado</th>
                <th>Acciòn</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $curso) { ?>
            <tr>
                <td><?php echo $curso["Curso"]["idCurso"]; ?></td>
                <td><?php echo $curso["Curso"]["descripcion"]; ?></td>
                <td><?php echo $curso["Grado"]["descripcion_general"]; ?></td>
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
                                        array("controller" => "Cursos", "action" => "view", $curso["Curso"]["idCurso"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Cursos", "action" => "edit", $curso["Curso"]["idCurso"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Cursos", "action" => "delete", $curso["Curso"]["idCurso"]),
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
        echo $this->Html->link("Nuevo Curso", array(
            "controller" => "Cursos", "action" => "add"
        ));
    ?>
</div>