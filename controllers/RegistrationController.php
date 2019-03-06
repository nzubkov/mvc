<?php
/**
 * Created by PhpStorm.
 * User: NZubkov
 * Date: 06.03.2019
 * Time: 14:39
 */

namespace controllers;

class RegistrationController extends Controller
{
    public function index()
    {
        parent::renderView('registration');
        $this->status = true;
    }
}