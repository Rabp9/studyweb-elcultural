<!-- File: /app/View/Asistencias/resultado.ctp -->
    
<?php 
    $this->html->addCrumb('Notas', '/Notas');
    
    $this->assign("title", "Notas - Reporte");
?>

<?php
    echo $this->Html->css("notas");
?>

<h2>Notas <small>Reporte</small></h2>
<?php
    foreach ($cursos as $curso) {
        echo "<h4>" . $curso["Curso"]["descripcion"] . "</h4>";
?>
    <table class="notas">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Peso</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($notas as $nota) {
            if($nota["Nota"]["idCurso"] == $curso["Curso"]["idCurso"]) {
?>   
            <tr>
                <td><?php echo $nota["Nota"]["descripcion"]; ?></td>
                <td class="trimestre" style="display: none;"><?php echo $nota["Nota"]["trimestre"]; ?></td>
                <td class="numero peso"><?php echo $nota["Nota"]["peso"]; ?></td>
                <td class="numero nota"><?php echo $nota["Nota"]["valor"]; ?></td>
            </tr>
<?php
            }
        }
?>
        </tbody>
    </table>
<?php
    }
?>