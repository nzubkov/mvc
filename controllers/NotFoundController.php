<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 06.03.2019
 * Time: 13:04
 */

namespace controllers;

class NotFoundController extends Controller
{
    public function index()
    {
        $this->renderView('404');
        $this->status = true;
    }
}