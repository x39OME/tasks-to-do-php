<?php

use App\App;
use App\Database\DBConnection;
use App\Database\QueryBuilder;
use Monolog\Logger;
use Monolog\Level;
use Monolog\Handler\StreamHandler;


require 'vendor/autoload.php';


/*
  // composer.json
    write in terminal => composer dump-autoload 
      require 'app/app.php';
      require 'app/Database/DBConnection.php';
      require 'app/Database/QueryBuilder.php';
      require 'app/Core/Router.php';
      require 'app/Core/Request.php';
      require 'app/Controllers/TaskController.php';
      require 'app/helpers.php';
*/

$log = new Logger('PHP-BASICS');
$log->pushHandler(new StreamHandler('queries.log', Logger::INFO));
// $log->pushHandler(new StreamHandler('queries.log', Level::Info));


App::set('config', require 'config.php');

QueryBuilder::make(
  DBConnection::make(App::get('config')['database']),
  $log
);