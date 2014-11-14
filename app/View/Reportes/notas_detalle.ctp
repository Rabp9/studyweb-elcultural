<!-- file path View/Reportes/notas_detalle.ctp -->

<?php
    echo $this->Html->css("notas");
?>

<h4>Trimestre I</h4>
<table class="notas">
    <thead>
        <tr>
            <th>N°</th>
            <th>Alumno</th>
            <?php
                foreach ($reporteNotas[0]["Notas"] as $nota) {
                    if($nota["trimestre"] == "I")
                        echo "<th>" . $nota["descripcion"] . " (" . $nota["peso"] . ")" . "</th>";
                }
            ?>
            <th>Promedio</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $i = 0;
        foreach($reporteNotas as $reporteNota) {
            echo "<tr>"
                . "<td>" . ($i + 1) . "</td>"
                . "<td>" . $reporteNota["Alumno"]["nombreCompleto"] ."</td>";
            $suma = 0;
            $factor = 0;
            foreach ($reporteNota["Notas"] as $nota) {
                if($nota["trimestre"] == "I") {
                    $suma += $nota["valor"] * $nota["peso"];
                    $factor += $nota["peso"];
                    echo "<td class='numero'>" . $nota["valor"] . "</td>";
                }
            }
            if($factor) {
                $promedio = $suma/$factor;
                echo "<td class='numero'>" . number_format($promedio, 2) . "</td>";
            }
            $i++;
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

<h4>Trimestre II</h4>
<table class="notas">
    <thead>
        <tr>
            <th>N°</th>
            <th>Alumno</th>
            <?php
                foreach ($reporteNotas[0]["Notas"] as $nota) {
                    if($nota["trimestre"] == "II")
                        echo "<th>" . $nota["descripcion"] . " (" . $nota["peso"] . ")" . "</th>";
                }
            ?>
            <th>Promedio</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $i = 0;
        foreach($reporteNotas as $reporteNota) {
            echo "<tr>"
                . "<td>" . ($i + 1) . "</td>"
                . "<td>" . $reporteNota["Alumno"]["nombreCompleto"] ."</td>";
            $suma = 0;
            $factor = 0;
            foreach ($reporteNota["Notas"] as $nota) {
                if($nota["trimestre"] == "II") {
                    $suma += $nota["valor"] * $nota["peso"];
                    $factor += $nota["peso"];
                    echo "<td class='numero'>" . $nota["valor"] . "</td>";
                }
            }
            if($factor) {
                $promedio = $suma/$factor;
                echo "<td class='numero'>" . number_format($promedio, 2) . "</td>";
            }
            $i++;
            echo "</tr>";
        }
    ?>
    </tbody>
</table>

<h4>Trimestre III</h4>
<table class="notas">
    <thead>
        <tr>
            <th>N°</th>
            <th>Alumno</th>
            <?php
                foreach ($reporteNotas[0]["Notas"] as $nota) {
                    if($nota["trimestre"] == "III")
                        echo "<th>" . $nota["descripcion"] . " (" . $nota["peso"] . ")" . "</th>";
                }
            ?>
            <th>Promedio</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $i = 0;
        foreach($reporteNotas as $reporteNota) {
            echo "<tr>"
                . "<td>" . ($i + 1) . "</td>"
                . "<td>" . $reporteNota["Alumno"]["nombreCompleto"] ."</td>";
            $suma = 0;
            $factor = 0;
            foreach ($reporteNota["Notas"] as $nota) {
                if($nota["trimestre"] == "III") {
                    $suma += $nota["valor"] * $nota["peso"];
                    $factor += $nota["peso"];
                    echo "<td class='numero'>" . $nota["valor"] . "</td>";
                }
            }
            if($factor) {
                $promedio = $suma/$factor;
                echo "<td class='numero'>" . number_format($promedio, 2) . "</td>";
            }
            $i++;
            echo "</tr>";
        }
    ?>
    </tbody>
</table>
<?php  
    echo $this->Form->button($this->Html->tag("span", "", array("class" => "glyphicon glyphicon-list-alt")) . " Exportar a PDF", array("class" => "btn btn-default"));
    echo $this->Form->end();
?>