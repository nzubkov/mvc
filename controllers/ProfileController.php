<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 12.03.2019
 * Time: 10:44
 */

namespace controllers;


use models\User\User;

class ProfileController extends Controller
{
    public function index()
    {
        if(!empty($_SESSION['user_id'])){
            $this->renderView('profile', ['user' => User::find($_SESSION['user_id'])]);
        } else {
            header('Location: /');
        }

    }
}