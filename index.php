<?php

use App\Core\Router;
use App\Core\Request;
use App\Controllers\TaskController;


require '_ini.php';


Router::make()
    ->get('', [TaskController::class, 'index'])
    ->post('task/create', [TaskController::class, 'create'])
    ->get('task/update', [TaskController::class, 'update'])
    ->get('task/delete', [TaskController::class, 'delete'])
    ->resolve(
        Request::uri(),
        Request::method()
    );
