<!-- file path View/Periodos/get_dias.ctp -->
<style>
    .clase_si {
        background-color: #18C0DF;
        color: #0066cc;
    }
    .clase_no {
        background-color: red;
        color: white;
    }
</style>
<table>
    <thead>
        <tr>
            <th>Hora</th>
            <th <?php echo $periodo["Periodo"]["domingo"] ? "class='clase_si'" : "class='clase_no'"; ?>>Domingo</th>
            <th <?php echo $periodo["Periodo"]["lunes"] ? "class='clase_si'" : "class='clase_no'"; ?>>Lunes</th>
            <th <?php echo $periodo["Periodo"]["martes"] ? "class='clase_si'" : "class='clase_no'"; ?>>Martes</th>
            <th <?php echo $periodo["Periodo"]["miercoles"] ? "class='clase_si'" : "class='clase_no'"; ?>>Miércoles</th>
            <th <?php echo $periodo["Periodo"]["jueves"] ? "class='clase_si'" : "class='clase_no'"; ?>>Jueves</th>
            <th <?php echo $periodo["Periodo"]["viernes"] ? "class='clase_si'" : "class='clase_no'"; ?>>Viernes</th>
            <th <?php echo $periodo["Periodo"]["sabado"] ? "class='clase_si'" : "class='clase_no'"; ?>>Sábado</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $horaInicio = '07:00';
            $horaFin = '15:00';
            while ($horaInicio <= $horaFin) {
        ?>
        <tr>
            <td><?php echo $horaInicio; ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
                $horaInicio = strtotime("+30 minutes", strtotime($horaInicio));
                $horaInicio = date("H:i", $horaInicio);
            }
        ?>    
        <tr>
            <td><?php echo $horaInicio; ?></td>
            <td><?php echo $periodo["Periodo"]["domingo"] ? "boton agregar" : "" ?></td>
            <td><?php echo $periodo["Periodo"]["lunes"] ? "boton agregar" : "" ?></td>
            <td><?php echo $periodo["Periodo"]["martes"] ? "boton agregar" : "" ?></td>
            <td><?php echo $periodo["Periodo"]["miercoles"] ? "boton agregar" : "" ?></td>
            <td><?php echo $periodo["Periodo"]["jueves"] ? "boton agregar" : "" ?></td>
            <td><?php echo $periodo["Periodo"]["viernes"] ? "boton agregar" : "" ?></td>
            <td><?php echo $periodo["Periodo"]["sabado"] ? "boton agregar" : "" ?></td>
        </tr>
    </tbody>
</table>