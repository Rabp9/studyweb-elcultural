<!-- File: /app/View/Periodo/index.ctp -->
<?php 
    $this->html->addCrumb('Periodos', '/Periodos');
    
    $this->assign("title", "Periodos - Lista");
?>

<h2>Periodos <small>Lista</small></h2>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Còdigo</th>
                <th>Periodo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($periodos as $periodo) { ?>
            <tr>
                <td><?php echo $periodo["Periodo"]["idPeriodo"]; ?></td>
                <td><?php echo $periodo["Periodo"]["descripcion"]; ?></td>
                <td><?php echo $periodo["Periodo"]["fechaInicio"]; ?></td>
                <td><?php echo $periodo["Periodo"]["fechaFin"]; ?></td>
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
                                        array("controller" => "Periodos", "action" => "view", $periodo["Periodo"]["idPeriodo"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Html->link(
                                        $this->Html->tag("span", "", array("class" => "glyphicon glyphicon-pencil")) .
                                        " Editar",
                                        array("controller" => "Periodos", "action" => "edit", $periodo["Periodo"]["idPeriodo"]),
                                        array("escape" => false)
                                    );
                                ?>
                            </li>
                            <li role="presentation">
                                <?php
                                    echo $this->Form->postLink($this->Html->tag("span", "", array(
                                        "class" => "glyphicon glyphicon-trash")) . " Eliminar",
                                        array("controller" => "Periodos", "action" => "delete", $periodo["Periodo"]["idPeriodo"]),
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
        echo $this->Html->link("Nuevo Periodo", array(
            "controller" => "Periodos", "action" => "add"
        ));
    ?>
</div>