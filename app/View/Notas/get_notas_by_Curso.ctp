<!-- file path View/Asistencias/get_notas_by_Curso.ctp -->

<table id="tblNotas">
<?php
    foreach ($notas as $nota) {
?>
    <tr>
        <td><?php echo $nota["Nota"]["descripcion"]; ?></td>
        <td class="unidad" style="display: none;"><?php echo $nota["Nota"]["unidad"]; ?></td>
        <td><?php echo $nota["Nota"]["valor"]; ?></td>
    </tr>
<?php
    }
?>
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