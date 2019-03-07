<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 07.03.2019
 * Time: 10:58
 */

require_once '../autoloader.php';
require_once '../bootstrap.php';
use Illuminate\Database\Capsule\Manager as DB;

/**
 * Миграции для создания двух таблиц: users и files
 */

DB::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('email', 255)->unique()->nullable(false)->change();
    $table->text('name')->nullable(true)->default(NULL);
    $table->text('password');
    $table->integer('age')->nullable(false);
    $table->text('avatar')->nullable(true)->default(NULL);
});

DB::schema()->create('files', function ($table) {
    $table->increments('id');
    $table->text('name')->nullable(false);
    $table->integer('user_id')->nullable(false);
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});