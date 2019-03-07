<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:57
 */

namespace controllers;

class AdminController extends Controller
{
    public function index()
    {
        if($_SESSION['auth'] == 1 && $_SESSION['isAdmin']){
            $this->renderView('admin');
        } else {
            $this->renderView('index');
        }
    }
}