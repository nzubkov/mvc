<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 23:03
 */

namespace controllers;

use models\User;

class AuthController extends Controller
{
    public function login()
    {
        if(User::login($this->userData['login'], $this->userData['password'])){
            header('/');
        } else {
            $this->status = false;
            throw new ControllerException('Неправильный логин или пароль. Проверьте ваши данные еще раз');
        }

    }
}