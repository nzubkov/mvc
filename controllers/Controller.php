<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:55
 */
namespace controllers;

use views\View\View;

abstract class Controller
{
    protected $userData;
    protected $status = false;
    protected $view;
    protected $renderedView = '';

    public function __construct($userData)
    {
        $this->userData = !empty($userData) ? $userData : [] ;
        $this->view = new View();
    }

    public function renderView($templatePath = '', $data = [])
    {
        $this->renderedView = $this->view->render($templatePath, !empty($data) ? $data : $this->userData);
    }

    public function hasView()
    {
        return !empty($this->renderedView);
    }

    public function getView()
    {
        return $this->renderedView;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function index()
    {

    }
}