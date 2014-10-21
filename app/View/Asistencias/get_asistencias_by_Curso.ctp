<!-- file path View/Asistencias/get_asistencias_by_Curso.ctp -->

<table id="tblAsistencias">
<?php
    foreach ($asistencias as $asistencia) {
?>
    <tr>
        <td><?php echo $asistencia["Asistencia"]["clase"]; ?></td>
        <td class="fecha"><?php echo $asistencia["Asistencia"]["fecha"]; ?></td>
        <td><?php echo $asistencia["Asistencia"]["descripcion"]; ?></td>
    </tr>
<?php
    }
?>
</table>

<script>
    var auxMes = 0;
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
    $("#tblAsistencias tr").each(function() {
        var fecha = $(this).find("td.fecha").text().split("-");
        var mes = fecha[1];
        if(auxMes !== mes) {
            auxMes = mes;
            $(this).before("<tr><td colspan='3'>" + meses[mes-1] + "</td></tr>");
        }
    })
</script>