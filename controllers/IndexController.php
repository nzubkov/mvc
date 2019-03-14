<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 06.03.2019
 * Time: 14:06
 */

namespace controllers;

class IndexController extends Controller
{
    public function index()
    {
        if(!empty($_SESSION['user_id'])) {
            header('Location: /profile');
        } else {
            $this->renderView('index');
        }
    }
}