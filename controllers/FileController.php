<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:56
 */

namespace controllers;

use models\File\Files;
use models\File\FileException;

class FileController extends Controller
{
    public function index()
    {
        $files = Files::getAll(!empty($this->userData['userId']) ? $this->userData['userId'] : '');
        $this->renderView('files', $files);
    }

    public function __construct($userData = [])
    {
        parent::__construct($userData);
        $this->userData['file'] = !empty($_FILES['file']) ? $_FILES['file'] : [];
    }

    public function upload()
    {
        //TODO добавить механизм проверки прав (авторизации)
        //механизм загрузки файлов
        if(empty($_FILES)){
            $this->status = false;

            return $this->status;
        }
        try{
            Files::upload($_SESSION['user_id'], $_FILES);
            $this->status = true;
        } catch (FileException $e){
            $this->status = false;
            throw new ControllerException($e->getMessage());
        }
    }
}