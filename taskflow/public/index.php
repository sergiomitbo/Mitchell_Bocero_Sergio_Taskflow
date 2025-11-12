<?php
require_once "functions.php";
define("SITE_NAME", "TaskFlow");

$userName = "Sergio";
$userAge = 18;
$isPremiumUser = true;

$pageTitle = SITE_NAME . " | Panel de Tareas";

$tasks = [
    [
        'title' => 'Estudiar PHP',
        'completed' => false,
        'priority' => 'alta'
    ],
    [
        'title' => 'Jugar al fútbol',
        'completed' => true,
        'priority' => 'media'
    ],
    [
        'title' => 'Programar una web',
        'completed' => false,
        'priority' => 'baja'
    ],
    [
        'title' => 'Actividad de OSKAR',
        'completed' => true,
        'priority' => 'alta'
    ],
    [
        'title' => 'Limpiar la casa',
        'completed' => false,
        'priority' => 'media'
    ]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .task-item {
            list-style: none;
            padding: 8px;
            margin-bottom: 6px;
            border-radius: 4px;
        }
        .completed {
            text-decoration: line-through;
            color: gray;
        }
        .priority-alta { background-color: #ffb3b3; }
        .priority-media { background-color: #ffe0b3; }
        .priority-baja { background-color: #d1ffd1; }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido a <?php echo SITE_NAME; ?>, <?php echo $userName; ?>!</h1>
        <p>Edad: <?php echo $userAge; ?> años</p>
        <p>Tipo de usuario: <?php echo $isPremiumUser ? 'Premium' : 'Gratis'; ?></p>
    </header>

    <h2>Lista de tareas</h2>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <?php
                $taskClasses = 'task-item';
                if ($task['completed']) {
                    $taskClasses .= ' completed';
                }
                switch ($task['priority']) {
                    case 'alta':
                        $taskClasses .= ' priority-alta';
                        break;
                    case 'media':
                        $taskClasses .= ' priority-media';
                        break;
                    case 'baja':
                        $taskClasses .= ' priority-baja';
                        break;
                }
            ?>
            <li class="<?php echo $taskClasses; ?>">
                <?php echo htmlspecialchars($task['title']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
