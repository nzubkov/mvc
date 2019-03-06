<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 06.03.2019
 * Time: 20:59
 */
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" =>"127.0.0.1",
    "database" => "mvc",
    "username" => "mysql",
    "password" => "mysql"
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();