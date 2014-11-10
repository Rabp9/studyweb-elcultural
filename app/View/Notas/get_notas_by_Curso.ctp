<!-- file path View/Asistencias/get_notas_by_Curso.ctp -->

<?php
    echo $this->Html->css("notas");
?>

<table class="notas">
    <thead>
        <tr>
            <th>Descripción</th>
            <th>Nota</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($notas as $nota) {
?>
    <tr>
        <td><?php echo $nota["Nota"]["descripcion"]; ?></td>
        <td class="unidad" style="display: none;"><?php echo $nota["Nota"]["trimestre"]; ?></td>
        <td><?php echo $nota["Nota"]["valor"]; ?></td>
    </tr>
<?php
    }
?>
    </tbody>
</table>

<script>
    var auxUnidad = "";
    $("#tblNotas tr").each(function() {
        var unidad = $(this).find("td.unidad").text();
        if(auxUnidad !== unidad) {
            auxUnidad = unidad;
            $(this).before("<tr><td colspan='3'>" + unidad + "</td></tr>");
        }
    })
</script>