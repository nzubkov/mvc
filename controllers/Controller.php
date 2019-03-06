<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:55
 */
namespace controllers;

use views\View\View;
use views\View\ViewException;

abstract class Controller
{
    protected $userData;
    protected $status = true;
    protected $view;
    protected $renderedView = '';

    public function __construct($userData)
    {
        $this->userData = !empty($userData) ? $userData : [] ;
        $this->view = new View();
    }

    public function hasView()
    {
        return !empty($this->view);
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

    public function renderView($templatePath, $data = [])
    {
        try {
            $this->renderedView = $this->view->render($templatePath, !empty($data) ? $data : $this->userData);
        } catch (ViewException $exception){
            throw new ControllerException($exception->getMessage());
        }
    }
}