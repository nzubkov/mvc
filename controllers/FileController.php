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
        parent::__construct([
            'file' => !empty($_FILES['file']) ? $_FILES['file'] : [],
            'userId' => $userData
        ]);
    }

    public function upload()
    {
        //механизм загрузки файлов
        if(empty($this->userData['file']) || empty($this->userData['userId'])){
            $this->status = false;
            return $this->status;
        }
        try{
            Files::upload($this->userData['userId'], $this->userData['file']);
        } catch (FileException $e){
            $this->status = false;
            throw new ControllerException($e->getMessage());
        }
    }
}