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
            $uploadedFile = File::upload($this->userData['file']);
            File::create($this->userData['userId'], $uploadedFile);
        } catch (FileException $e){
            throw new ControllerException($e->getMessage());
        }
    }
}