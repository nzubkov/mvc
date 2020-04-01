<?php
/**
 * Created by PhpStorm.
 * User: огпе
 * Date: 05.03.2019
 * Time: 22:56
 */

namespace controllers;

use models\File\File;
use models\File\FileException;

class FileController extends Controller
{
    public function index()
    {
        $files = File::getAll(!empty($this->userData['userId']) ? $this->userData['userId'] : '');
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
        try {
            File::upload($this->userData['userId'], $_FILES);
            $this->status = true;
        } catch (FileException $e){
            $this->status = false;
            throw new ControllerException($e->getMessage());
        }
    }
}