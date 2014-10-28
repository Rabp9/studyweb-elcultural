<!-- file path View/Reportes/estadisticas.ctp -->

<h2>Reportes <small>Estadísticas</small></h2>
<?php
    echo $this->Form->input('idCurso', array(
        "label" => "Curso",
        "div" => "formField",
        "options" => $cursos,
        "empty" => "Selecciona uno"
    ));
    echo $this->Html->div(null, "", array("id" => "dvEstadisticas"));
    /*
     * Nombre de Docente
     * Grado y Secciòn
     * Nota Promedio
     * Numero de alumnos
     * 3 primeros puestos
     * Numero de alumnos aprobados
     * Numero de alumnos desaprobados
     * Nota minima
     * Nota maxima
     * Nro de clases
     */
?>

<?php
    $this->Js->get('#idCurso')->event('change', 
        $this->Js->alert("dasda")
        /*$this->Js->request(array(
            'controller' => 'Periodos',
            'action' => 'getDias'
        ), array(
            'update'=>'#dvHorario',
            'async' => true,
            'method' => 'post',
            'dataExpression'=>true,
            'data'=> $this->Js->serializeForm(array(
                'isForm' => true,
                'inline' => true
            ))
        ))
         *
         */
    );
?>