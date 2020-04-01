<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:57
 */

namespace controllers;

use models\User\User;
use models\User\UserException;
use services\UserRegistrationService;

class UserController extends Controller
{
    public function index()
    {
        $this->renderView('index');
    }

    public function profile()
    {
        if(!empty($_SESSION['auth'])){
            $this->renderView('profile', User::where('id', $_SESSION['user']['id']));
        } else {
            $this->index();
        }
    }

    public function login()
    {
        if(!empty($_SESSION['auth'])) {
            header('Location: /profile');
        }
        if(empty($this->userData)) {
            $this->renderView('index', ['message' => 'Введите логин и пароль']);
            return;
        }
        $user = User::login($this->userData['login'], $this->userData['password']);
        if(!empty($user)){
            $_SESSION['auth'] = 1;
            $_SESSION['user_id'] = $user->id;
            header('Location: /profile');
        } else {
            $this->renderView('index', ['message' => 'Неправильный логин или пароль. Проверьте ваши данные еще раз']);
        }
    }

    public function signup()
    {
        if (empty($this->userData)) {
            return $this->status;
        }
        if (!empty($_FILES['avatar'])) {
            $this->userData['avatar'] = $_FILES['avatar'];
        }
        $service = new UserRegistrationService();
        $this->status = $service->run($this->userData);
        $this->renderView('registration', ['success' => $this->status, 'errors' => $service->getErrors()]);
    }
}