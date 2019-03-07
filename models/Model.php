<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:39
 */
namespace models;
use \Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\QueryException;

abstract class Model extends Eloquent
{
    protected $table;
}