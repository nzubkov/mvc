<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 07.03.2019
 * Time: 10:58
 */

require_once '../vendor/autoload.php';
require_once '../bootstrap.php';
use Illuminate\Database\Capsule\Manager as DB;

/**
 * Миграции для создания двух таблиц: users и files
 */
try {

    DB::schema()->create('users', function ($table) {
        $table->increments('id');
        $table->string('email')->unique()->nullable(false);
        $table->text('name')->nullable(true)->default(NULL);
        $table->text('password');
        $table->integer('age')->nullable(false);
        $table->text('avatar')->nullable(true)->default(NULL);
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
    });
    echo "Таблица users создана\n";
    DB::schema()->create('files', function ($table) {
        $table->increments('id');
        $table->text('name')->nullable(false);
        $table->integer('user_id')->unsigned()->nullable(false);
        $table->foreign('user_id')->references('id')->on('users');
        $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
    });
    echo "Таблица files создана\n";
    echo "Миграции прошли успешно\n";
} catch (\Exception $exception) {
    echo "Ошибка при миграции. {$exception->getMessage()}\n";
}



