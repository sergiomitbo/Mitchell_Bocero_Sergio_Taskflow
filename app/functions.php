<?php
function obtenerClasePrioridad($prioridad) 
{
    switch ($prioridad) 
    {
        case 'alta':
            return 'priority-alta';
        case 'media':
            return 'priority-media';
        case 'baja':
            return 'priority-baja';
        default:
            return '';
    }
}

function renderizarTarea($tarea)
{
    $clasesTarea = 'task-item ' . obtenerClasePrioridad($tarea['prioridad']);
    
    if ($tarea['completado']) {
        $clasesTarea .= ' completed';
    }

    $tituloSeguro = htmlspecialchars($tarea['titulo'], ENT_QUOTES, 'UTF-8');
    
    return '<li class="' . $clasesTarea . '">' . $tituloSeguro . '</li>';
}
?>
