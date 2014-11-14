<!-- file path View/Asistencias/get_notas_by_Curso.ctp -->

<?php
    echo $this->Html->css("notas");
?>

<table class="notas" id="tblNotas">
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
?>
    <tr>
        <td><?php echo $nota["Nota"]["descripcion"]; ?></td>
        <td class="trimestre" style="display: none;"><?php echo $nota["Nota"]["trimestre"]; ?></td>
        <td class="numero peso"><?php echo $nota["Nota"]["peso"]; ?></td>
        <td class="numero nota"><?php echo $nota["Nota"]["valor"]; ?></td>
    </tr>
<?php
    }
?>
    </tbody>
</table>
<script>
    var auxTrimestre = "";
    var notas = [];
    var trimestres = [];
    $("#tblNotas tbody tr").each(function() {
        var trimestre = $(this).find("td.trimestre").text();

        if(auxTrimestre !== trimestre) {
            auxTrimestre = trimestre;
            $(this).before("<tr><td colspan='3' style='text-align: center;'><b>Trimestre " + trimestre + "</b></td></tr>");
            trimestres.push(trimestre);
        }        
        var nota = {
            "nota": $(this).find("td.nota").text(),
            "peso": $(this).find("td.peso").text(),
            "trimestre": trimestre
        };
        notas.push(nota);
    })
    var subtotal = 0;
    var factor = 0;
    if(trimestres.length > 0) {
        $("#dvNotas").append("<table id='tblPromedios' class='notas'>\n\
            <thead>\n\
                <tr>\n\
                    <th>Trimestre</th>\n\
                    <th>Promedio</th>\n\
                </tr>\n\
            </thead>\n\
            <tbody>\n\
            </tbody>\n\
        </table>");
    }
    for(var i = 0; i < trimestres.length; i++) {
        for(var j = 0; j < notas.length; j++) {
            if(notas[j].trimestre == trimestres[i]) {
                subtotal += notas[j].nota * notas[j].peso;
                factor += parseInt(notas[j].peso);
            }
        }
        var promedio = subtotal / factor;
        $("#tblPromedios tbody").append("<tr>\n\
            <td>Trimestre " + trimestres[i] + "\
            <td>" + promedio.toFixed(2) + "\
        </tr>");
        subtotal = 0;
        factor = 0;
    }
</script>