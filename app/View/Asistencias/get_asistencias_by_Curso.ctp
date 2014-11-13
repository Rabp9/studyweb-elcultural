<!-- file path View/Asistencias/get_asistencias_by_Curso.ctp -->

<?php
    echo $this->Html->css("asistencias");
?>

<table class="asistencias" id="tblAsistencias">
    <thead>
        <tr>
            <th>Clase</th>
            <th>Fecha</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>

<script>
    var auxMes = 0;
    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
    $("#tblAsistencias tbody tr").each(function() {
        var fecha = $(this).find("td.fecha").text().split("-");
        var mes = fecha[1];
        if(auxMes !== mes) {
            auxMes = mes;
            $(this).before("<tr><td colspan='3' style='text-align: center;'><b>" + meses[mes-1] + "</b></td></tr>");
        }
    })
</script>