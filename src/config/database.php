<?php 
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;


$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'exercicio-crud-contatos',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
]);



// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->setAsGlobal();
$capsule->bootEloquent();


  
