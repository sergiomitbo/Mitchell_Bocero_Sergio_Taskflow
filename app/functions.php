<?php
obtenerClasePrioridad($prioridad) {
    switch ($prioriad) {
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
renderizarTarea($tarea