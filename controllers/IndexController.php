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
        $this->renderView('index', $this->userData);
        $this->status = true;
    }
}