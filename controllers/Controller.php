<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:55
 */
namespace controllers;

abstract class Controller
{
    protected $status = false;
    protected $userData;

    public function __construct($userData)
    {
        $this->userData = !empty($userData) ? $userData : [] ;
    }

    public function getStatus()
    {
        return $this->status;
    }
}