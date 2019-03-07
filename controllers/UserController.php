<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:57
 */

namespace controllers;

use models\User\Users;
use models\User\UserException;

class UserController extends Controller
{
    public function index()
    {
        $this->renderView('index');
    }

    public function profile()
    {
        if(!empty($_SESSION['auth'])){
            $this->renderView('profile', Users::where('id', $_SESSION['user']['id']));
        } else {
            $this->index();
        }
    }

    public function login()
    {
        if(empty($this->userData)) {
            throw new ControllerException('Введите логин и пароль');
        }
        $user = Users::login($this->userData['login'], $this->userData['password']);
        if(!empty($user)){
            $this->status = true;
            $_SESSION['auth'] = 1;
            $_SESSION['user'] = $user;
            header('/profile');
        } else {
            throw new ControllerException('Неправильный логин или пароль. Проверьте ваши данные еще раз');
        }
    }

    public function register()
    {
        if(empty($this->userData)){
            return $this->status;
        }

        try {
            Users::create($this->userData);
            $this->status = true;
            $message = 'Регистрация прошла успешно. Можете перейти на страницу входа в <a href="/">Личный кабинет</a>';
        } catch(UserException $exception) {
            $message = 'Не удалось зарегистрироваться из-за ошибки: ' . $exception->getMessage();
        } finally {
            $this->renderView('registration', [
                'message' => $message
            ]);
        }
    }
}